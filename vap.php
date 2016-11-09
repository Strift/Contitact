<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$letter=$_GET["letter"];
if($letter==""){$letter="all";}
?>
<!-- <H2>All contacts managed by Contitact</H2> -->

<H3><IMG src="images/_users_large.gif"> <?PHP print get_the_number_of_peoples()?>&nbsp; contacts</H3>
<?PHP 
print "<a href=\"vap.php?letter=all\"><img border=0 src=\"images/_view_all_contacts.gif\">All </a>\n";
display_all_first_letters_of_name();?>

<?PHP
/*$all_peoples=get_all_peoples();
foreach($all_peoples as $name => $pk)
	{
		print "<a href=\"vop.php?pk=$pk\">$name</a><BR>\n";
	}
*/			
//$all_peoples=get_all_peoples();

$all_peoples=get_all_peoples_filetered_by_letter($letter);

$nbcol=4;			
$nbline=((int) (get_the_number_of_peoples()/$nbcol)); 

			print "<TABLE width=90% border=0>";	
			print "<TR ><TH colspan=2>$cat</TH></TR><TD valign=top>";
  
      if ($all_peoples)
      {
			  foreach($all_peoples as $name => $pk)
			  {
  				print "<a href=\"vop.php?pk=$pk\"><img border=0 src=\"images/_user_file.gif\"> $name</a><BR>\n";
				  if ($nbline--==0){print "</TD><TD valign=top>"; $nbline=(int)(get_the_number_of_peoples()/$nbcol); }
			  }
      }
			print "</TABLE>";      
?>
</body>
</html>