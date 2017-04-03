<?php
session_start();
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'])
	header('location: /intranet/login.php?redirect=explorateur.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>File Explorer</title>	
	<?php include('../head.php'); ?>
	<link rel="stylesheet" href="fileExplorer.css" />
</head>
<body>
	<?php include('../background.php'); ?>	
    <h1><a href="/">CLUB1</a>›<a href="/intranet/">Intranet</a>›Explorateur</h1>
	<?php
	require 'dossier.php';

	$rootPath = '../../';
	$root = new Dossier('root');

	$root->listage($rootPath);
	$root->triAlpha();
	$root->affichage('', false);

	?>

<script src="fileExplorer.js"></script>
</body>
</html>
