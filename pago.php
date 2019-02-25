<?php
include 'default/header.php';
require_once "clases/Peticiones_WS.php";
$tipoCuenta=$_REQUEST['tipoCuenta'];
$listaBancos=$_REQUEST['listaBancos'];

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

        

        <div class="container">
          <form action="transaccion.php" method="post" name="pago" ><!--Formulario-->

            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>Descripción</label>
              <input type="text" class="form-control" id="description"  name="description" value="Pago en Place To Pay" disabled='true' >
              <input type='hidden' class="form-control" id="description"  name="description" value="Pago en Place To Pay" >
            </div>
            </div>

            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>Total a Pagar COP</label>
              <input type="text" class="form-control"  id="totalAmount"  name="totalAmount" value="10.000" disabled='true' >
              <input type='hidden' class="form-control"  id="totalAmount"  name="totalAmount" value="10.000" >
            </div>
            </div>

            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>Referencia</label>
              <input type="text" class="form-control" id="reference"  name="reference" value="5976030f5575d" disabled='true' >
              <input type='hidden' class="form-control" id="reference"  name="reference" value="5976030f5575d" >
            </div>
            </div>


            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>E-mail</label>
              <input type="text" class="form-control" id="emailAddress"  name="emailAddress" value="joharflo@hotmail.com" disabled='true' >
              <input type='hidden' class="form-control" id="emailAddress"  name="emailAddress" value="joharflo@hotmail.com">
            </div>
            </div>

            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>Tipo Documento</label>
              <input type="text" class="form-control"  id="documentType"  name="documentType" value="CC" disabled='true' >
              <input type='hidden' class="form-control"  id="documentType"  name="documentType" value="CC">
            </div>
            </div>

            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>Documento</label>
              <input type="text" class="form-control" id="document"  name="document" value="1126416255" disabled='true' >
              <input type='hidden' class="form-control" id="document"  name="document" value="1126416255">
            </div>
            </div>

            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>Nombre</label>
              <input type="text" class="form-control" id="firstName"  name="firstName" value="Johnny" disabled='true' >
              <input type='hidden' class="form-control" id="firstName"  name="firstName" value="Johnny">
            </div>
            </div>

            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>Apellido</label>
              <input type="text" class="form-control"  id="lastName"  name="lastName" value="Florez" disabled='true' >
              <input type='hidden' class="form-control"  id="lastName"  name="lastName" value="Florez" >
            </div>
            </div>

            <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <label>Celular</label>
              <input type="text" class="form-control" id="mobile"  name="mobile" value="3107233414" disabled='true' >
              <input type='hidden' class="form-control" id="mobile"  name="mobile" value="3107233414" >
            </div>
            </div>


            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <input type='hidden' class="form-control" id="tipoCuenta"  name="tipoCuenta" value="<?php echo $tipoCuenta; ?>" hidden='true' >

              </div>
            </div>


            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <input type='hidden' class="form-control" id="listaBancos"  name="listaBancos" value="<?php echo $listaBancos; ?>" hidden='true' >
              </div>
            </div>




            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button type="submit" class="btn btn-primary">Seguir</button>
              </div>
            </div>

          </form>
        </div>



      </div>
    </div>
  </div>
 <h2>*** Simulamos los datos del pago para este ejercicio ***</h2> 
</div>



<?php include 'default/footer.php';  ?>
