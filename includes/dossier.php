<?php
class Dossier
{
	private $name;
	private $nbSubDir = 0;
	private $listSubDir = [];
	private $nbFiles = 0;
	private $listFiles = [];
	
	public function __construct($nomDossier)
	{
		$this->name = $nomDossier;
	}
	
	public function getListFiles() 
	{
		return $this->listFiles;
	}
	
	public function getNbFiles() 
	{
		return $this->nbFiles;
	}
	
	public function isEmpty()
	{
		return $this->nbSubDir + $this->nbFiles == 0;
	}
	
	public function hasChild()
	{
		return $this->nbSubDir > 0;
	}
	
	public function hasFiles()
	{
		return $this->nbFiles > 0;
	}
	
	public function addSubDir($dirName)
	{
		$this->listSubDir[$dirName] = new Dossier($dirName);
		$this->nbSubDir ++;
	}
	
	public function addFile($fileName)
	{
		$this->listFiles[] = $fileName;
		$this->nbFiles ++;
	}
	
	function listage($path)
	{
		if($dossier = opendir($path))
		{
			while (($element = readdir($dossier)) !== false)  //pour tous les elements de ce dossier...
			{
				if ($element != '.' && $element != '..')
				{
					if (is_dir($path.$element)) //si c'est un dossier...
					{
						$this->addSubDir($element);
						$this->listSubDir[$element]->listage($path.$element.'/');
					}
					else
					{
						$this->addFile($element);
					}
				}
			}
		}
	}
	
	public function triAlpha()
	{
		sort ($this->listFiles,SORT_NATURAL | SORT_FLAG_CASE);
		ksort ($this->listSubDir,SORT_NATURAL | SORT_FLAG_CASE);
		foreach ($this->listSubDir as $subDir)
			$subDir->triAlpha();
	}
	
	public function affichage($path, $isOpen)
	{
		$comptSubDir = 1;
		$nbSubDir = $this->nbSubDir;
		$openAttribute = '';
		if ($isOpen)
			$openAttribute = ' open';
		echo '<ul>';
		foreach ($this->listSubDir as $subDir)
		{
			$subPath = $path.$subDir->name;
			if (!$subDir->isEmpty())
			{
				if ($comptSubDir == $nbSubDir && !$this->hasFiles())
					echo '<li class="last">└─';
				else
					echo '<li>├─';
				echo'<details'.$openAttribute.'><summary>📁<button class="etiquette" data-path="'.$subPath.'" ondblclick="openDir(this)">'.$subDir->name.'</button></summary>';
				if ($subDir->hasChild())
					$subDir->affichage($subPath.'/', $isOpen);
				if ($subDir->hasFiles())
				{
					$comptFile = 1;
					$nbFiles = $subDir->getNbFiles();
					echo '<ul>';
					foreach ($subDir->getListFiles() as $file)
					{
						if ($comptFile == $nbFiles)
							echo '<li class="last">└─';
						else
							echo '<li>├─';
						echo '📄<button class="etiquette" data-path="'.$subPath.'/'.$file.'" ondblclick="openFile(this)">'.$file.'</button></li>';
						$comptFile ++;
					}
					echo '</ul>';
				}	
				echo '</details></li>';
			}
			else
			{
				if ($comptSubDir == $nbSubDir && !$this->hasFiles())
					echo '<li class="last">└─';
				else
					echo '<li>├─';
				echo '📁<button class="etiquette">'.$subDir->name.'</button></li>';
			}
			$comptSubDir ++;
		}
		echo '</ul>';
	}
}
?>