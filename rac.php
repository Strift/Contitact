<?PHP
include ("TOOLS/CORE_DB_Functions.php");
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>
<H2>Rename a category</H2>
<H4>Please select a category from the one below</H4>
<form action="renacat.php" method="GET">
Rename
<select name="cat">
	<?PHP
	$AC=get_all_categories();
  
    $index=0;
	foreach ($AC as $cat)
	{
		print "<option name=\"cat\" value=\"$cat\">$cat</option>";
	}
  /*
  for ($index=1; $AC[$index] != ""; $index++)
	{
		print "<option name=\"cat\" value=\"$AC[$index]\">$AC[$index]</option>";
	}
  */
  
  /*
  	foreach ($AC as $cat)
	{
		$catsent=urlencode($cat);
		print "<div><li margin-left=80><a href=\"vocaa.php?cat=$catsent\">$cat</a></li></div>\n";
	}
  */
	?>
</select>
TO
<input name="newcat" maxlength="80" <?PHP if ($r_cat!="") print "value=\"$r_cat\""; ?> alt="No special characters"  title="No special characters" size="20">
<input type="submit" value="Rename">
</form>
</BODY>
</HTML>