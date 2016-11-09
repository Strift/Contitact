<?PHP
include ("TOOLS/CORE_DB_Functions.php");
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>
<H2>You are <font color="black">removing a category</font></H2>
<H4>Please select the category to remove</H4>
<form action="removecat.php" method="GET">
Remove this&nbsp
<select name="cat">
	<?PHP
	$AC=get_all_categories();
	foreach ($AC as $cat)
	{
		print "<option name=\"cat\" value=\"$cat\">$cat</option>";
	}
	?>
</select>
&nbsp
<blink>
<input type="submit" value="Remove !!!">
</blink>
</form>
</BODY>
</HTML>