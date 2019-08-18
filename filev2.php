<!--
    https://zerobyte.id/
	Issued Feb 9th, 2018
    
	https://sainskomputer.com/
	recode Ags 17th, 2019

    NoxCube Changelog:
    # recode Aug 18th, 2019
        1. Reconstructed the html and styles
        2. Repaired wrong logic when fetching url from $_POST
        3. Added required attribute to the input.text and textarea
        4. Added url validation
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Path Mas By ZeroByte.ID x VrCy</title>
    <style type="text/css">
        body{
            color:#009900;
            background:#111111;
            font-family:'Courier';
            text-align:center;
        }
        textarea{
            color:#009900;
            font-family: monospace;
            background:transparent;
            border-color:#009900;
            padding:5px;
            resize:none;
            width:700px;
            height:150px;
        }
        input[type="text"]{
            color:#009900;
            font-size: 1em;
            font-family: monospace;
            background:transparent;
            border: 1px solid #009900;
            padding:5px;
            width:700px;
            margin: 0 0 10px 0;
        }
        input[type="submit"]{
            color:#111111;
            background:#009900;
            margin-top:10px;
            font-size:20px;
            border:2px double #009900;
            padding:2px;
            padding-left:150px;
            padding-right:150px;
            font-family:Arial
        }
        pre{
            color:#009900;
            font-size: 1.2em;
            margin:auto;
            margin-bottom:20px;
            background:transparent;
            border : 1px solid #009900;;
            padding:5px;
            width:700px;
            text-align:left;
        }
        .return{
            color:#111111;
            background:#009900;
            margin-top:15px;
            font-size:20px;
            border:2px double #009900;
            padding:2px;
            padding-left:150px;
            padding-right:150px;
            font-family:Arial;
            text-decoration: none;
        }
    </style>
</head>
<body>
<h1>Path Mass By ZeroByte.ID x VrCy</h1>
<?php if(empty($_POST['check'])) : ?>
<form method="post">
    <textarea name="list" placeholder="e.g. : https://sainskomputer.com (don't forget to add the protocol before url)" required></textarea><br>
    <input type="text" name="path" placeholder="e.g. : /path/files.ext" required/><br>
    <input type="submit" name="check" value="Check"/>
</form>
<?php endif; ?>
<?php
$keyword = array("WebPath", "0byt3m1n1", "IndoXploit","Shell","shell","wso","uploader","Priv8","Uploader"); // Edit Here

if(!empty($_POST['check'])) {
    echo '<h2>Result</h2>'.PHP_EOL;
    echo '<pre>'.PHP_EOL;
    $list = $_POST['list'];
    $path = $_POST['path'];
    $shell = explode(PHP_EOL, $list);
	foreach($shell as $key => $val) {
        $url = trim($val).trim($path);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            echo "<font color='red'>[Invalid URL] ".$url."</font>".PHP_EOL ;
            continue;
        }
		$keyx = '/(' .implode('|', $keyword) .')/';
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_TIMEOUT,10);
		$shellcurl = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if($httpcode == '200' && preg_match_all("$keyx", $shellcurl))  {
			echo "[OK!] ".$url.PHP_EOL; 
		}
		else {
			echo "<font color='red'>[BAD] ".$url."</font>".PHP_EOL;
    	}
	}
    echo '</pre>'.PHP_EOL;
    echo '<a href="" class="return">Return</a>';
}
?>
</body>
</html>
