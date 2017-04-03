<!DOCTYPE html>
<html>
<head>
	<title>File Explorer</title>
	<link rel="stylesheet" href="./styles/fileExplorer.css" />
</head>
<body>
    <h1>Explorateur</h1>
	
	<?php
	require './includes/dossier.php';

	$rootPath = '../../';
	$root = new Dossier('root');

	$root->listage($rootPath);
	$root->triAlpha();
	$root->affichage('', false);

	?>

<script src="./includes/fileExplorer.js"></script>
</body>
</html>
