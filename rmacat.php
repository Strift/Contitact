<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<BR><BR><H2>Remove a category on Contitact</H2>
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


