<?php

class LoginValidator
{
      //LO que voy a validar
      private $userEmail;
      private $userPassword;
      private $errors = [];

      public function __construct(string $email, string $password)
      {
        $this->userEmail = $email;
        $this->userPassword = $password;
      }

      public function loginValidate($loginEmail, $loginPassword)
      {
        if ($this->userEmail != $loginEmail)
        {
           $this->errors ['email'][] = 'El usuario no ha sido registrado';
         }
        elseif ($this->userPassword != $userPassword)
        {
           $this->errors ['password'][] = 'Contraseña incorrecta';
         }
         else
         {
          $_SESSION['email'] = $loginEmail;
          setcookie('loginEmail', $loginEmail, time() + 60*60*24);
          header('location: index.php');
        //  break;
         }

        /*  if($_FILES['avatar']['error'] != 0){
               $errors ['avatar'] [] = 'Hubo un error al cargar la imagen';
             }
             $ext= pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
             if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
               $errors ['avatar'] [] = 'La imagen debe ser jpg, jpeg o png';
             } */
        }


      public function getErrors()
      {
        return $this->errors;
      }

      public function getError($field)
      {
        return $this->errors[$field][0] ?? '';
      }

      public function isValid()
      {
        return empty($this->errors);
      }
}




 ?>
