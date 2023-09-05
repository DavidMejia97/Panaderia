<?php
 require('clase_correo.php');

 $objEmail = new Email();

 if (!empty($_POST['name']) &&  !empty($_POST['email']) && !empty($_POST['mensaje'])){
     $fullname = $_POST['name'];    
     $email = $_POST['email'];
     $mensaje = $_POST['mensaje'];

     $confirmacion = $objEmail->enviarCorreo($fullname,$email,$mensaje);
    if($confirmacion == null){
      echo '<script>';
      echo 'alert("Correo enviado correctamente, pronto nos contactaremos contigo");';
      echo 'window.setTimeout(function(){';
      echo 'window.location.href="../index.php";';
      echo  '},10);';
      echo '</script>';
    }else{
      echo '<script>';
      echo 'alert("Existió un error en el envio del correo, por favor intente nuevamente o verifique que el correo que ingreso sea el correcto '.$confirmacion.'");';
      echo 'window.setTimeout(function(){';
      echo 'window.location.href="../index.php#contactUs";';
      echo  '},10);';
      echo '</script>';
    }
  }else{
    echo '<script>';
    echo 'alert("Porfavor verfique que los campos no esten vacios ");';
    echo 'window.setTimeout(function(){';
    echo 'window.location.href="../index.php#contactUs";';
    echo  '},10);';
    echo '</script>';}
?>