<?PHP
include ("TOOLS/CORE_DB_Functions.php");
//We should change the current category to the new name received
$Cat   =$_GET['cat'];
//Calling the query to change the category name...
remove_a_category($Cat);
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="1;URL=./soc.php">
<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<CENTER>
<H1>
<?PHP
print "Category removed...";
?>
</H1>
</CENTER>
</BODY>
</HTML>