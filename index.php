<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<body class="login-body col-sm-12">
  <div class="login-page" >
      <div class="text-center titulolog">
        <h1 class="">Bienvenido al sistema de inventario MotoProtect</h1>
        <img  src="libs/images/logo.jpg">
        <p class="inicion">Iniciar sesión <p>
      </div>
      <?php echo display_msg($msg); ?>
        <form method="post" action="auth.php" class="clearfix form">
          <div class="form-group">
                <label for="username" class="control-label">Usuario</label>
                <input type="name" class="form-control" name="username" placeholder="Usuario">
          </div>
          <div class="form-group">
              <label for="Password" class="control-label">Contraseña</label>
              <input type="password" name= "password" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group">
                  <button type="submit" class="btn btn-info  pull-right">Entrar</button>
          </div>
      </form>     
  </div>
  <?php include_once('layouts/footer.php'); ?>
</body>

