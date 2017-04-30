<!DOCTYPE html>
<html>
<head>
<?php 
	//ini_set("display_errors",0);error_reporting(0);
	if(isset($_GET['source']) && isset($_GET['type']))
	{
		$config = require './includes/config.php';
		$rootPath = $config->rootPath;
		$filePath = $_GET['source'];
		$fileType = $_GET['type'];
		$fullPath = $rootPath.$filePath;
		$pieces = explode('/', $filePath);
		$fileName = array_pop($pieces);
		$pieces = explode('.', $fileName);
		$ext = array_pop($pieces);
		
		switch($fileType)
		{
			case 'img':{
				include('views/img.php');
				break;
			}
			case 'text':{
				if ($contenu = file_get_contents($fullPath))
					include('views/code.php');
				else
					echo "</head><body><p>Ce fichier n'existe pas</p></body><html>";
				break;
			}
		}
	}
	else
		echo "</head><body><p>Aucun fichier spécifié</p></body><html>";
?>
</html>