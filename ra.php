<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<BR><BR><H2>Remove an attribut category on Contitact</H2>
<form target="_self" enctype="text/plain" method="get" action="crmacat.php" name="addcategory">
	<TABLE width=90%>
		<TR>
		<TD width=20%></TD>
		<TD width=20% align=center>
		<input maxlength="80" <?PHP if ($r_cat!="") print "value=\"$r_cat\""; ?> alt="No special characters"  title="No special characters" size="20" name="cat">
		</TD>
		<TD  width=20% align="left">
	  	<input type="submit" value="Add this category" id="buttonGo" />
	  	</TD>
		<TD width=20%></TD>
	  	
	</TABLE>
</form>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$pk=$_GET['pk'];
$cat=$_GET['cat'];
$att=$_GET['att'];

if ($pk =="" )
{
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="4;URL=./description.html.php">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>

<?PHP
print "<H2><BR><BLINK><font color=\"red\">ERROR: The pk is missing!!!</font><BLINK></H2>\n";
die();
}
	else
{
remove_an_attribute_on_contact($pk,$cat,$att);
?>
	<HTML>
	<HEAD>
	<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=./vapr.php">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/>
	</HEAD>
	<?PHP
}
?>