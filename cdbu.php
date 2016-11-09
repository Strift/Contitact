<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>	
<?PHP
	include ("TOOLS/CORE_DB_Functions.php");
	$dbused=get_the_database_used();
	print "<H2><U>The database used is: $dbused</U></H2>";
	print "<BR><H4>Here is the list of available databases:</H4><BR>";
	$DBS = get_all_databases();
	$index=0;
	while ($DBS[$index])
	{
	 	$currentdb=$DBS[$index];
		print "<A HREF=\"cdbuto.php?dbused=$currentdb\"><LI>$currentdb</LI></A>\n";
		$index++;
	}
?>

