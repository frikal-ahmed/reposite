<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
    form
    {
        background: linear-gradient(45deg,#e5fcb1 20%,snow 100%);
        margin-left:500px;
        width: 400px;
    }
    btn
    {
        width:50%;
        height:50%;
    }
    
    </style>
</head>
<body>
      <ul class="pager">
      <li class="previous"><a href="Programe.php">Programe</a></li>
     <li class="next"><a href="#">Next</a></li>
     </ul>
    <form method="POST" action="" >
    <div class="form-group">
    <label for="email">Type De travaile</label>
    <input type="text" class="form-control" name="typetra" id="">
  </div>
   
  <div class="form-group">
    <label for="email">Date de travail</label>
    <input type="date" class="form-control" name="Date_travail" id="">
  </div>
     
  <div class="form-group">
    <label for="email">Le lien</label>
    <input type="text" class="form-control" name="lien">
  </div>

    
     <div class="form-group">
    <input type="submit"  value="ajouter" class="btn btn-success" name="ajt">
    </div>
    </form>
    <?php
    session_start();
    require_once("cnx.php");
     if(isset($_POST['ajt']) && $_POST['typetra']!="")
     {
      $ajouter="insert into programe (Type_de_tarvail,Date_travail,cin,lien) values('".$_POST['typetra']."','".$_POST['Date_travail']."',".$_SESSION['user'].",'".$_POST['lien']."')";
      $insert=mysqli_query($Moncnx,$ajouter);
      echo"<script language='javascript'> alert('Type remplire '); </script>";
       }
       else
       {
        echo"<script language='javascript'> alert('Remplisez les champs !!!! '); </script>";
       }

    ?>
</body>

</html>
  