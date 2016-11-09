<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$pk = $_GET['pk'];
$pknote=$_GET['pknote'];
$note=$_GET['note'];
$cat=$_GET['cat'];
/*
print "PK received: $pk<BR>";
print "pknote=$pknote<BR>";
print "note=$note<BR>";
print "cat=$cat<BR>";
*/
insert_a_note($pknote,$cat,$note);
?>
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
print "Ok note added...";
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
