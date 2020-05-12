<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Exemple de thème WordPress</title>
<!-- CSS de Bootstrap -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
rel="stylesheet">
<!-- Ajout d'une nouvelle feuille de style qui sera spécifique à notre thème -->
<link href="<?php bloginfo('template_directory');?>/blog.css" rel="stylesheet">
<!-- HTML5 shim et Respond.js pour supporter les éléments HTML5 pour Internet
Explorer 8 -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body>
<div class="header">
<div class="container">
<nav id="navigation-principale" role="navigation">
<a class="active" href="#">Accueil</a>
<a href="#">Services</a>
<a href="#">À Propos</a>
<a href="#">Contact</a>
</nav>
</div>
</div>
<div class="container">
<div class="blog-header">
<h1 class="blog-title">Exemple de thème WordPress</h1>
<p class="lead blog-description">Création d'un thème WordPress à titre de tutoriel sur
WP Pour Les Nuls.</p>
</div>