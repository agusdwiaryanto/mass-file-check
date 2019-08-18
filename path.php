<?php
/*
	https://zerobyte.id/
	Issued Feb 9th, 2018
	https://sainskomputer.com/
	recode Ags 18th, 2019
*/

$keyword = array("WebPath", "0byt3m1n1", "IndoXploit","Shell","shell","wso","uploader","Priv8","Uploader","admin","Admin","login","Login"); // Edit Here

if(!empty($_POST['check'])) {
		$list = $_POST['list'];
		$path = $_POST['path'];
		$shell = explode(PHP_EOL, $list);
			foreach ($shell as $key => $val) {
				$shell[$key] = trim($val).trim($path);
}

	echo '<pre>';
	foreach($shell as $shellchk) {
		$url = trim($shellchk);
		$keyx = '/(' .implode('|', $keyword) .')/';
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_TIMEOUT,10);
		$shellcurl = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if($httpcode == '200' && preg_match_all("$keyx", $shellcurl))  {
			echo "[OK!] $url\n"; 
		}
		else {
			echo "<font color='red'>[BAD] $url</font>\n";
		}
	}
	echo '</pre>';
}
echo "<html>\n";
echo "<head>\n";
echo "<title>Path Mass By ZeroByte.ID x VrCy</title>";
echo '<style type="text/css">body{color:#009900;background:#111111;font-family:\'Courier\'}textarea{color:#009900;background:transparent;border-color:#009900;padding:5px;}input{color:#111111;background:#009900;margin-top:10px;font-size:20px;border:2px double #009900;padding:2px;padding-left:150px;padding-right:150px;font-family:Arial}</style>';
echo "\n</head>";
echo "<body>\n";
echo "<center>";
if(empty($_POST['check'])) {
	echo "<h1>Path Mass By ZeroByte.ID x VrCy</h1>\n";
	echo '<form method="post">'."\n";
	echo '<textarea name="list" placeholder="https://sainskomputer.com" style="width:700px;height:250px;">'."\n";
	echo "</textarea><br>\n";
echo '<form method="post">'."\n";

	echo '<textarea name="path" placeholder="/path/files.ext" style="width:700px;height:50px;">'."\n";
	echo "</textarea><br>\n";

	echo '<input type="submit" name="check" value="Check"/>'."\n";
	echo "</form>\n";
}
echo "</center>\n";
echo "</body>\n";
echo "</html>";

?>
