<?PHP
	include ("TOOLS/CORE_DB_Functions.php");
	$dbused   = $_GET['dbused'];
	change_the_database_used_to($dbused);
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="1;URL=./vap.php">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>
<H1>The database used is now:<?PHP print "$dbused"; ?></H1>
</body>	
