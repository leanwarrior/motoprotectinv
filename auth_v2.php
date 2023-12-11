<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

  if(empty($errors)){

    $user = authenticate_v2($username, $password);

        if($user):
           //Crear una sesion con el ID
           $session->login($user['id']);
           //Actualizar la hora del ultimo logueo
           updateLastLogIn($user['id']);
           // redireccionar al usuario a la pagina principal del nivel de grupo
           if($user['user_level'] === '1'):
             $session->msg("s", "Hello ".$user['username'].", Bienvenido a Motoprotect.");
             redirect('admin.php',false);
           elseif ($user['user_level'] === '2'):
              $session->msg("s", "Hello ".$user['username'].", Bienvenido a Motoprotect.");
             redirect('special.php',false);
           else:
              $session->msg("s", "Hello ".$user['username'].", Bienvenido a Motoprotect.");
             redirect('home.php',false);
           endif;

        else:
          $session->msg("d", "Lo sentimos, su contraseña es incorrecta.");
          redirect('index.php',false);
        endif;

  } else {

     $session->msg("d", $errors);
     redirect('login_v2.php',false);
  }

?>
