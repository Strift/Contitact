<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$cat=$_GET['cat'];

if ($cat =="" )
{
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="2;URL=./aac.php?cat=<?PHP print "$cat"; ?>">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>

<?PHP
print "<H2><BR><BLINK><font color=\"red\">ERROR: The category is not filled properly!!!</font><BLINK></H2>\n";die();
}
	else
{
create_a_cat($cat);
?>
	<HTML>
	<HEAD>
	<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=./soc.php">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/>
	</HEAD>
	<?PHP
}
?>
