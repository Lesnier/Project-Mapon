<?php //defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron header">
    <div class="container text-center">
      <h1>Welcome to <?= $nombre ?>!</h1>
      <p>To access the services, please login to be authorized</p>
      <p><a class="btn btn-primary btn-lg button" target="_blank" href="<?= FOLDER_PATH ?>/login" role="button">Login</a></p>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>