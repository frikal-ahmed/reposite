<?php
session_start(); 
require_once("cnx.php");
if(isset($_POST['ok'])){
$id=$_POST['cin'];
$mdp=$_POST['mdp'];
$requete="select * from user where Cin_utilisateur=".$id." and Mot_de_passe  ='".$mdp."'";
$res=mysqli_query($Moncnx,$requete);
if(mysqli_fetch_assoc($res))
{  
  $_SESSION['user']=$_POST['cin']; 
  header("location: Programe.php");
}
else
{
    echo"<script> alert('Votre adresse ou  bien mot de passe est incorectte'); </script>";
}
}
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script >
     function chocher()
      {
       var Variable=document.getElementById("cocher");
       if(Variable.checked)
      {
        document.getElementById("btn").style.display="block";
      }
      else
      {
        document.getElementById("btn").style.display="none";
      }

      }

     </script>
     <style>
     .row
      {
       margin-left: 290px;
       margin-top: 100px;
    
      }
     
     </style>
	<title>Login Page</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h2 class="card-title text-center">Authentification</h2>
            <form class="form-signin" method="POST">
              <div class="form-label-group">
                <input  name="cin"  class="form-control" placeholder="Email address" required >
                <label for="inputEmail">Email address</label>
              </div>
         
              <div class="form-label-group">
                <input type="password" name="mdp" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
         
              </div>
            
              <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" name="Chekbox" id="cocher" onclick="chocher();">
                <label class="custom-control-label" for="customCheck1">Cochez Pour activer Le bouttton</label>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="ok" id="btn">Connecter</button>
              </div>
             
        
        
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>