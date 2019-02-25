<?php
require_once "clases/Peticiones_WS.php";

session_start(); // incio de uso de sesiones.
$transactionID=$_SESSION['transactionID']; // asignamos a $variable la
// variable de la session áctiva.


try {
  $newPeticion = new Peticiones_WS();
  $informacion = $newPeticion->ObtInfTrans($transactionID);

} catch (SoapFault $fault) {
  trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);

}
$data =$informacion->getTransactionInformationResult;
$res=$data->transactionState;

include 'default/header.php';
?>

<div class="container">

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Zona de Pruebas Place To Pay</h3>
      </div>
      <div class="panel-body">

        <div class="row">
          <img src="./imagenes/pse.png" alt="">
        </div>

        <div class="row">

        <h1 ><p class="text-center"><?php echo $data->transactionState;  ?></p></h1>
        </br>
          <h1><p class="text-center"><?php echo $data->responseReasonText; ?></p></h1>

        </div>
        <div class="row">
          <p class="text-center"><a class="btn btn-primary" href="index.php" role="button">ok</a></p>
        </div>


      </div>
    </div>
  </div>
  <h2>*** Regresamos a la pagina informamos al cliente del resultado de la transaccion ***</h2> 
</div>
<?php session_destroy(); include 'default/footer.php';  ?>
