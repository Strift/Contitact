<?PHP
include ("TOOLS/CORE_DB_Functions.php");
	$pk = $_GET['pk'];
	$cat=$_GET['cat'];
	$att=$_GET['att'];
	if ($att != "") 
  {insert_a_cat_att($pk,$cat,$att);
	?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=./vop.php?pk=<?PHP print "$pk"; ?>">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<CENTER>
<H1>
<?PHP
print "Ok attribute added...";
/*
print "PK received: $pk<BR>";
print "pknote=$pknote<BR>";
print "note=$note<BR>";
print "cat=$cat<BR>";
*/
?>
</H1>
</CENTER>
</BODY>
</HTML>
<?PHP }else{ ?>

<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="1;URL=./vop.php?pk=<?PHP print "$pk"; ?>">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<CENTER>
<H1>
<?PHP
print "Not ok attribute is empty...";
/*
print "PK received: $pk<BR>";
print "pknote=$pknote<BR>";
print "note=$note<BR>";
print "cat=$cat<BR>";
*/
}
?>
