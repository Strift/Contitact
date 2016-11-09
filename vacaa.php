<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="vocaa">
<BR><H4>All categories managed by Contitact</H4>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$AC=get_all_categories();
?>

<?PHP
//	$nbcol=2;<TABLE border=1><TD>
	$nbcol=4;
	foreach ($AC as $cat)
	{

		$nbline=((int) (get_nb_of_attributes_for_category($cat)/$nbcol)); // get_nb_of_attributes_for_category($cat);
		if ($cat != "onepeople" && $cat != "adress" && $cat != "emails" && $cat !="phonenumber")
		{
			print "<TABLE width=90% border=0>";	
			print "<TR ><TH colspan=2>$cat<hr noshade=\"noshade\" width=\"100%\" /></TH></TR><TD width=30% valign=top>";
			$AA = get_all_attributes($cat);
			
			foreach ($AA as $attrib => $occurence)
			{
//				print "<TD width="30%" >$attrib <a href=\"vocap.php?cat=$cat&attrib=$attrib\" target=\"main\">($occurence)</a></TD></TR>\n";
				print "$attrib <a href=\"vocap.php?cat=$cat&attrib=$attrib\" target=\"main\">($occurence)</a><BR>\n";
				if ($nbline--==0){print "</TD><TD valign=top>"; $nbline=(int)(get_nb_of_attributes_for_category($cat)/$nbcol); }
			}
			print "</TABLE>";
		}
//		if ($nbcol--==2)
		{}
//		if ($nbcol==0){$nbcol=2;}
	}
?>

</body>
</html>