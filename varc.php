<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
	<title>"This page shows all details for a contact"</title>
</head>
<body>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
//print "This page shows all details for a contact";
$pk=$_GET['pk'];

$namesurname=get_the_name_surname($pk);
$knowby=get_the_related_contact($pk);
$knowname=$knowby['name'];
$knowpk=$knowby['pk'];
print "<div class=\"vop\">\n";
print "<TABLE cellspacing=0 cellpadding=0 width=95%><TR height=3%>\n";
print "<TD width=66%><a title=\"Change the current field\" href=\"uans.php?pk=$pk\"><H1><img border=0 src=\"images/_user_large.gif\"> $namesurname</H1></a><a href=vop.php?pk=$pk><img border=0 src=\"images/_previouspage.gif\"> Back to the description...</a></TD>\n";
print "<TD align=\"left\"><H5>Knew by: <a href=\"vop.php?pk=$knowpk\" title=\"Show $knowname\" ><img border=0 src=\"images/_user_file.gif\"> $knowname</a></H5></TD>\n";
print "</TR>\n";
print "</TABLE>\n";
print "<HR width=\"100%\">";
//get_all_related_contact($pk,"images/_user.gif","images/_users_large.gif);
print "<div>";
$nb = get_number_of_all_related_contact($pk);
print "<dl width=40%><dt><H3><img src=\"images/_users_large.gif\"> $nb contact(s)</H3></dt><dd><ul>\n";


get_all_related_contact($pk,"images/_user_file.gif");
?>
</body>
</html>


