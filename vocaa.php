<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div clas="vocaa">
<?PHP
$cat = $_GET['cat'];
include ("TOOLS/CORE_DB_Functions.php");

$nbcol=3;			


/*
			print "<TABLE width=90% border=0>";	
			print "<TR ><TH colspan=2>$cat</TH></TR><TD valign=top>";

			foreach($all_peoples as $name => $pk)
			{
				print "<a href=\"vop.php?pk=$pk\"><img border=0 src=\"images/_user_file.gif\"> $name</a><BR>\n";
				if ($nbline--==0){print "</TD><TD valign=top>"; $nbline=(int)(get_the_number_of_peoples()/$nbcol); }
			}
			print "</TABLE>";

*/      

			print "<a href=\"soc.php\"><H2><img border=0 src=\"images/_category_large.gif\">$cat</H2></a>\n";
			print "<TABLE width=90%><TD width=%5><TD>\n";
			$AA = get_all_attributes($cat);
      $nbline=((int) ( count(get_all_attributes($cat)) / $nbcol)); 
      
			foreach ($AA as $attrib => $occurence)
			{	
			   print "<a border=0 href=\"vocap.php?cat=$cat&attrib=$attrib\" target=\"main\"><img border=0 src=\"images/_attribut.gif\">$attrib ($occurence)</a><BR>\n";
      if ($nbline--==0){print "</TD><TD valign=top>"; $nbline=(int)( $nbline=((int) ( count(get_all_attributes($cat)) / $nbcol)) ); }
			}
			print "</TABLE>\n";
?>
</div>
</body>
</html>