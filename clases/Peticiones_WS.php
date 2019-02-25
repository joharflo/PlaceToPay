<?php
require_once "./default/config.php";
// clase para interactuar con el Webservices
class Peticiones_WS {

  protected $clienteWS;
  //credenciales suministradas
  protected $login='6dd490faf9cb87a9862245da41170ff2';
  protected $secretKey='024h1IlD';

	public function __construct()	{
    //configuracion para el cache local de las lista de bancos
    ini_set('soap.wsdl_cache_enabled', 1);
    ini_set('soap.wsdl_cache_dir',ROOT_PATH);
    ini_set('soap.wsdl_cache_ttl', 86400);
    ini_set('soap.wsdl_cache_limit',1);
    $options = array(
		'cache_wsdl'   => WSDL_CACHE_DISK,
		'trace'=>true,
	);
		$this->clienteWS= new SoapClient('https://test.placetopay.com/soap/pse/?wsdl',$options);
		$this->clienteWS->__setLocation('https://test.placetopay.com/soap/pse/');
	}

  //Funcion para listar los bancos disponibles con
  // el metodo getBankList
  public function lista_bancos()
  {
    $login= $this->login;
    $secretKey= $this->secretKey;
    $seed = date('c');
    $tranKey =sha1($seed.$secretKey);
    $additional=array('name' =>'' , 'value' =>'' );
    $parametros =array('login'=>$login,'tranKey'=>$tranKey,'seed'=>$seed,'additional'=>$additional);
    $auth=array('auth'=>$parametros);
    $listaBancos = $this->clienteWS->getBankList($auth);
    return $listaBancos;
  }

  //funcion para crear la transaccion con el
  // metodo createTransaction
  public function crea_trans($bankCode,$bankInterface,$description,$totalAmount,$reference,$emailAddress,$documentType,$document,$firstName,$lastName,$mobile)
  {
    $login= $this->login;
    $secretKey= $this->secretKey;
    $seed = date('c');
    $tranKey =sha1($seed.$secretKey);
    $additional=array('name' =>'' , 'value' =>'' );
    $parametros =array('login'=>$login,'tranKey'=>$tranKey,'seed'=>$seed,'additional'=>$additional);
    $auth=array('auth'=>$parametros);//
    $reference=$reference;

    //URL de retorno modificar a conveniencia configurada en archivo config.php
    $returnURL=HOST."regreso.php";
    $description=$description;
    $language='ES';
    $currency='COP';
    $totalAmount=(double)$totalAmount;
    $taxAmount=3.00;
    $devolutionBase=2.00;
    $tipAmount=1.00;
    $payer=array(
      'document'=>$document,
      'documentType'=>$documentType,
      'firstName'=>$firstName,
      'lastName'=>$lastName,
      'company'=>'Sysuario',
      'emailAddress'=>$emailAddress,
      'address'=>'LA40',
      'city'=>'Timotes',
      'province'=>'Merida',
      'country'=>'Venezuela',
      'phone'=>'2715545632',
      'mobile'=>$mobile
    );
    //optenemos ip necesaria
    $ipAddress=$this->obtenerIP();
    $userAgent='PlacetoPay Sandbox';
    $transac=array(
      'bankCode'=>$bankCode,
      'bankInterface'=>$bankInterface,
      'returnURL'=>$returnURL,
      'reference'=>$reference,
      'description'=>$description,
      'language'=>$language,
      'currency'=>$currency,
      'totalAmount'=>$totalAmount,
      'taxAmount'=>$taxAmount,
      'devolutionBase'=>$devolutionBase,
      'tipAmount'=>$tipAmount,
      'payer'=>$payer,
      'buyer'=>$payer,
      'shipping'=>$payer,
      'ipAddress' => $ipAddress,
      'userAgent'=>'PlacetoPay Sandbox',
      'additional'=>$additional
    );

    $transaction= array('auth'=>$parametros,'transaction' =>$transac);
    $Trans = $this->clienteWS->createTransaction($transaction);
    return $Trans;
  }

  //funcion para obtener informacion de la transferencia con el
  // metodo getTransactionInformation
  public function ObtInfTrans($transactionID)
  {
    $login= $this->login;
    $secretKey= $this->secretKey;
    $seed = date('c');
    $tranKey =sha1($seed.$secretKey);
    $additional=array('name' =>'' , 'value' =>'' );
    $parametros =array('login'=>$login,'tranKey'=>$tranKey,'seed'=>$seed,'additional'=>$additional);
    $infTrans= array('auth'=>$parametros,'transactionID' =>$transactionID);
    $informacion = $this->clienteWS->getTransactionInformation($infTrans);
    return $informacion;
  }

  //funcion para obtener ip
  function obtenerIP() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }
}

?>
