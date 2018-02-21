<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="refresh" content="30" />
    <meta charset="utf-8">
    <title>Mini Chat </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="jquery-3.2.1.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
  form{
    text-align: center;
    margin-top: 100px;


  }

  </style>
  <body>


<form action="minichat_post.php" method="post">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="pseudo" value="
   <?php
   if(isset($_COOKIE['pseudo'])){
     echo htmlspecialchars($_COOKIE['pseudo']);
   }

   ?>">

    <label class="mdl-textfield__label" >Pseudo</label>
  </div><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="message"  id="message">
    <label class="mdl-textfield__label" >Message</label>
  </div><br>
  <button  id="triggerDialog" type="submit" value="send" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
    SEND
  </button>
  <a href="javascript:window.location.reload()"><button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="button" name="button"> Reload Page</button></a>
</form>
<!----chat---->






<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','**********');
}

catch (Exception $e)
{
        die('Error : '.$e->getMessage());
}
$response = $bdd->query('SELECT pseudo , message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

while($data = $response->fetch()){ ?>
  <div class="col-sm-3 col-sm-offset-4 frame">
    <ul></ul>
      <div>
        <div class="msj-rta macro" style="margin:auto;margin-left:140px;margin-top:1.5em">
          <div class="text text-r" style="background:whitesmoke;font-size:18px !important">
          <?php  echo  "<strong>"  .htmlspecialchars($data['pseudo']) ."</strong>" . "<br>" .
          htmlspecialchars($data['message']) ?>
        </div>
      </div>
    </div>
  </div>
  <?php



}
$response->closeCursor();
?>


<script src="app.js"></script>
  </body>
</html>
