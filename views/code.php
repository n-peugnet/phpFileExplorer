	<title>Code Source - <?= $fileName ?></title>
	<meta name="Title" content="Code Source - <?= $fileName ?>"/>
	<meta name="Description" content="Code source du programme <?= $fileName ?>"/>
</head>
<body>	
	<link rel="stylesheet" href="highlight/styles/arduino-light.css">
	<script src="highlight/highlight.pack.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
<?php
			echo '<pre><code>'.htmlspecialchars($contenu).'</code></pre>';
?>
</body>