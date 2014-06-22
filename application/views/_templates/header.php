<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tasks management</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body>
<!-- header -->
<div class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Tasks managements</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo URL; ?>/tasks/index">List des taches</a></li>
            <li><a href="<?php echo URL; ?>/tasks/index/ressource">Vue par ressource</a></li>
          </ul>
        </div>
      </div>
    </div>