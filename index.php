<?php
//clase usadas
require_once "clases/Peticiones_WS.php";
try {
  //instanciamos la clase
  $newPeticion = new Peticiones_WS();
  //llamaos una funcion de la clase par listar los Bancos
  $listaBancos = $newPeticion->lista_bancos();
  $lista =$listaBancos->getBankListResult;
  $res=$lista->item;

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

          <div class="container">
            <form action="pago.php" method="post" name="lista" ><!--Formulario-->

              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label><h3>Indique el Tipo de cuenta con la cual realizara el pago</h3></label>
                  <p>
                    <select name="tipoCuenta" id="tipoCuenta">
                      <option value=0>Personal</option>
                      <option value=1>Empresas</option>
                    </select>
                  </p>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label><h3>Indique de la lista la entidad finaciera con la cual desea realizar el pago</h3></label>
                  <p>
                    <select name="listaBancos" id="listaBancos">
                      <?php foreach($res as $listin){?>
                        <option value="<?php echo $listin->bankCode; ?>"><?php echo $listin->bankName; ?></option>
                      <?php }?>
                    </select>
                  </p>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <button type="submit" class="btn btn-primary">Seguir con pago PSE</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'default/footer.php';

} catch (Exception $e) {
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
            <?php echo "No se pudo obtener la lista de Entidades Financieras, por favor intente más tarde";?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'default/footer.php';
}
?>
