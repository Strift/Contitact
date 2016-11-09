x<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<BR><BR><H2>Add a category on Contitact</H2>
<?PHP $r_cat=$_GET['cat']; ?>
<form target="_self" enctype="text/plain" method="get" action="iac.php" name="addcategory">
	<TABLE width=90%>
		<TR>
		<TD width=20%></TD>
		<TD width=20% align=center>
		<input maxlength="80" <?PHP if ($r_cat!="") print "value=\"$r_cat\""; ?> alt="No special characters"  title="No special characters" size="20" name="cat">
		</TD>
		<TD  width=20% align="left">
	  	<!--<input type="submit" value="Add this category" id="buttonGo" /> -->
      <BUTTON name="submit" value="submit" type="submit">Add <IMG src="images/_add_button.gif"></BUTTON>
	  	</TD>
		<TD width=20%></TD>
	  	
	</TABLE>
</form>
