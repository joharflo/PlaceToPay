<?php
require_once "clases/Peticiones_WS.php";

//recibimos los parametros que vienen de pago.php
$bankCode=$_REQUEST['listaBancos'];
$bankInterface=$_REQUEST['tipoCuenta'];
$description=$_REQUEST['description'];
$totalAmount=$_REQUEST['totalAmount'];
$reference=$_REQUEST['reference'];
$emailAddress=$_REQUEST['emailAddress'];
$documentType=$_REQUEST['documentType'];
$document=$_REQUEST['document'];
$firstName=$_REQUEST['firstName'];
$lastName=$_REQUEST['lastName'];
$mobile=$_REQUEST['mobile'];

try {
  //intanciamos la clase y llamamos el metodo para crer la transaccion
  $newPeticion = new Peticiones_WS();
  $Trans = $newPeticion->crea_trans($bankCode,$bankInterface,$description,$totalAmount,$reference,$emailAddress,$documentType,$document,$firstName,$lastName,$mobile);

} catch (SoapFault $fault) {
  trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);

}
$transss =$Trans->createTransactionResult;
$res=$transss->bankURL;
// incio de  sesion para guardar la transactionID
session_start(); 
$_SESSION['transactionID']=$transss->transactionID;
//para ir a la pagina del banco
header('Location: '.$res);

?>
