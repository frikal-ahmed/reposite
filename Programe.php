<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        body{
         height:100%;
         width:100%;
       
        background-repeat: no-repeat; /* Do not repeat the image */
       background-size: cover; /* Resize the background image to cover the entire container */  background-image: url("https://www.smallbusinessact.com/wp-content/uploads/2019/03/entrepreneur-comment-garder-motivation-01.png")
     }
     .date
       {
    
         font-size: larger;
       font-family: Georgia, 'Times New Roman', Times, serif;
       border: gainsboro 1px solid;
       
     }
       
    </style>
      <script>
          function dt(){
            n =  new Date();
            y = n.getFullYear();
           m = n.getMonth() + 1;
           d = n.getDate();
           document.getElementById("date").innerHTML =" Le Programe d'Aujourd'hui   Le  :" + m + ":" + d + ":" + y;
          }
        </script>

    
</head>
<body onload="dt();" >
<div  class="container" >
  <h4 id="date">  </h4>
  <?php 
  session_start();
  require_once("cnx.php");
  $utilisateur="select Nom_complet,photo from user where  Cin_utilisateur='".$_SESSION['user']."'";
  $resultat=mysqli_query($Moncnx,$utilisateur);
  if($utli=mysqli_fetch_array($resultat))
  {
       $_SESSION['utilisateur']=$_SESSION['user'];
      echo "<img  src='".$utli['photo']."' class='img-thumbnail'/>";
     echo"<h3 class='text-white'>Le Nom De Utilisateur:".$utli['Nom_complet']."</h3>";
  }
  ?>
   <a href="ajouter.php"><button type="submit" class="btn btn-danger">Programe de demain</button> </a> 
  </div>



  <?php
  /*Ajouter une boutton Modification sur css*/
  require_once("cnx.php");
  $Myafichage="select p.*,u.photo,u.Nom_complet from user u join programe p on(p.cin=u.Cin_utilisateur) where u.Cin_utilisateur='".$_SESSION['user']."' and   p.Date_travail=CURRENT_DATE()";
  $res=mysqli_query($Moncnx,$Myafichage) ;
  echo"<table class='table'>;
  <tr style='background-color:coral;' >
  <th>Npro</th>
  <th >Type de travail </th>
  <th >Date </th>
  <th>Le lien</th>
  </tr>";
  while($ligne=mysqli_fetch_array($res))
  {
    
   echo"<td>"; echo"<p>".$ligne['npro']."</p>";  echo"</td>";
   echo"<td>"; echo"<p>".$ligne['Type_de_tarvail']."</p>"; echo"</td>";
   echo"<td>"; echo"<p>".$ligne['Date_travail']."</p>";  echo"</td>";
   echo"<td>"; echo"<a href='".$ligne['lien']."'>".$ligne['lien']."</a>";  echo"</td>";
   echo"</tr>";
  }
  echo"</table>";
  ?>
  
</body>
</html>