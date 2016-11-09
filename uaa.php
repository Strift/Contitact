<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$pk=$_GET['pk'];
$cat=$_GET['cat'];
$att=$_GET['att'];
if ( $att=="" || $pk =="" ||  $cat=="")
{
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="1;URL=./vop.php?pk=<?PHP print "$pk"; ?>">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>

<?PHP
print "<HTML><H2><font color=\"red\">ERROR: attribute need to be filled properly</font></H2><HTML>\n";exit();
}
update_an_attribut_for($pk,$cat,$att);
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=./vop.php?pk=<?PHP print "$pk"; ?>">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>
<?PHP //print "pk: $pk, att:$att, cat:$cat";?>