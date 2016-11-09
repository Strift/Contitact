<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
	<title>"This page allows the selection of a category"</title>
</head>
<body>
<?PHP
	include ("TOOLS/CORE_DB_Functions.php");
	$AC = get_all_categories();
	$nb=count($AC);
?>

<H3><IMG src="images/_category_large.gif"><?PHP print " $nb";?> categories</H3>
<div class="c">
<TABLE width=90%><TD width=%20></TD>
<TD>
	<?PHP
  if ($nb==0){die("");} 
	foreach ($AC as $cat)
	{
	  /*        $cat = get_category_name($catpk) */
		$catsent=urlencode($cat);
		$number=get_number_of_element_on_a_category($cat);    
		print "<div class=\"soc\"><a href=\"vocaa.php?cat=$catsent\"><img border=0 src=\"images/_category.gif\"> $cat($number)</a><BR></div>\n";
	}
	?>
	</TD>
	</TABLE>
	</div>
</body>
</html>