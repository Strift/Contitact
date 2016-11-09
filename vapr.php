<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<H2>Select the contact you want to <blink><font color="black">remove</font></blink></H2>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$all_peoples=get_all_peoples();
  $nbcol=4;
$nbline=((int) (get_the_number_of_peoples()/$nbcol)); 

			print "<TABLE width=90% border=0>";	
			print "<TR ><TH colspan=2>$cat</TH></TR><TD valign=top>";
			foreach($all_peoples as $name => $pk)
			{
				print "<a href=\"crop.php?pk=$pk\"><img border=0 src=\"images/_delete_contact.gif\">$name</a><BR>\n";
				if ($nbline--==0){print "</TD><TD valign=top>"; $nbline=(int)(get_the_number_of_peoples()/$nbcol); }
			}
			print "</TABLE>";
?>