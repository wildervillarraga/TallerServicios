<?php session_start(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container"></div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido al Banco ABC</h1>
        <p>Donde puedes pagar tus facturas</p>
      </div>
    </div>

    <div class="container">
        
      <?php if(isset($_SESSION['cliente'])) { ?>
        <div class="row">
          <div class="col-md-12">
            <h2>Cliente</h2>
            <?php include_once("cliente/cliente.php"); ?>
            <?php $cliente = unserialize($_SESSION['cliente']); ?>
            <div><label>Nombre: </label> <?php print $cliente->getNombreCliente(); ?></div>
            <form action="cliente/cerrar.php" method="post" role="form">
              <button type="submit" class="btn btn-success">Cerrar Sesión</button>
            </form>
          </div>
        </div>

        <hr>
        
        <div class="row">
          <div class="col-md-12">
            <h2>Saldo cuenta</h2>
            <?php include_once("cuenta/consultar.php"); ?>
            <?php $saldo = cuentaConsultarSaldo(); ?>
            <div><label>Saldo: </label> <?php print '$ ' . $saldo; ?></div>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-md-12">
            <h2>Código de Factura</h2>
            <form action="factura/consultar.php" method="post" role="form">
              <div class="form-group">
                <input type="text" placeholder="Código de Factura" name="factura" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-success">Consultar</button>
            </form>
          </div>
        </div>

        <hr>

        <?php if(isset($_SESSION['factura'])) { ?>
          <?php include_once("factura/factura.php"); ?>
          <?php $factura = unserialize($_SESSION['factura']); ?>
          <div class="row">
            <div class="col-md-12">
              <h2>Información Factura</h2>
              <div><label>Número Factura: </label> <?php print $factura->getIdFactura(); ?></div>
              <div><label>Valor: </label> <?php print $factura->getValorFactura(); ?></div>
              <div><label>Convenio: </label> <?php print $factura->getConvenioFactura(); ?></div>
              <form action="factura/pagar.php" method="post" role="form">
                <button type="submit" class="btn btn-success">Pagar</button>
              </form>
            </div>
          </div>

          <hr>
        <?php } ?>

        <?php if(isset($_SESSION['transaccion'])) { ?>
          <?php include_once("transaccion/transaccion.php"); ?>
          <?php $transaccion = unserialize($_SESSION['transaccion']); ?>
          <div class="row">
            <div class="col-md-12">
              <h2>Información Transacción</h2>
              <div><label>Número Transacción: </label> <?php print $transaccion->getIdTransaccion(); ?></div>
              <div><label>Respuesta Transacción: </label> <?php print $transaccion->getRespuestaTransaccion(); ?></div>
            </div>
          </div>

          <hr>

          <?php if(isset($_SESSION['factura'])) { unset($_SESSION['factura']); } ?>
          <?php if(isset($_SESSION['cuenta'])) { unset($_SESSION['cuenta']); } ?>
          <?php if(isset($_SESSION['transaccion'])) { unset($_SESSION['transaccion']); } ?>

        <?php } ?>
      <?php } else { ?>
        <div class="row">
          <div class="col-md-12">
            <h2>Iniciar Sesión</h2>
            <form action="cliente/consultar.php" method="post" role="form">
              <div class="form-group">
                <input type="text" placeholder="Documento de Identificación" name="documento" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text" placeholder="Contraseña" name="psw" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-success">Ingresar</button>
            </form>
          </div>
        </div>

        <hr>
      <?php } ?>
        
      

      <footer>
        <p>&copy; Company 2017</p>
      </footer>
    </div>
    
    <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>