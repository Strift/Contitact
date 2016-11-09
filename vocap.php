<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?PHP
//<BR><BR><H2>All peoples managed by Contitact with the same attribute</H2>
$cat =   $_GET['cat'];
$attrib = $_GET['attrib'];
include ("TOOLS/CORE_DB_Functions.php");

print "<a href=\"vocaa.php?cat=$cat\"><H1><img border=0 src=\"images/_category_large.gif\">$cat</H1></a>  ";
 print "<H2 dir=\"ltr\" style=\"margin-left: 30\"><img border=0 src=\"images/_attribut_large.gif\"> $attrib</H2>";
?>
<ul>
<?PHP
	$AP=get_all_peoples_with_the_same_attribut($cat,$attrib,0);	
	foreach($AP as $pk){$tab[$pk]=get_the_name_surname($pk); }
	natcasesort($tab);
	
	foreach($tab as $pk => $String)
	{
		print "<ul><a href=\"vop.php?pk=$pk\"><img border=0 src=\"images/_user_file.gif\"> $String</a></ul>\n";
	}	
?>
</ul>
				
		
</body>
</html>