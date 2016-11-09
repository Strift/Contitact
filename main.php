<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<H1>This is the test page for the whole site<BR></H1>
<a href="teststyle.php">Test the style ?</a>
<?php
include ("TOOLS/CORE_DB_Functions.php");
print ("<H3>Connection checking...</H3>\n");
connectdb();
$AC = get_all_categories();
$index=0;
while( $AC[$index]!=null )
{	print("tablename:: $AC[$index] <BR>\n"); 
$index++;}

$AA = get_all_attributes($AC[2]);

//$valeur = "Arbre";
//$Good = $AA["Arbre"];
//print "GOOOD is $Good<BR>\n";
/*
foreach ($AA as $keys => $Val )
{
	$valeur = $AA[$keys];	
	print "Here is an attributes !!! : $keys : $valeur<BR>\n";
}
*/
print ("View on people<BR>");
$nbp=get_the_number_of_peoples();
print ("The number of people on the database is $nbp...<BR>\n");
$selected = $nbp % 3 +6;
print "The number $selected is the one...";
$String=get_the_name_surname($selected);
print "The string is $String<BR>";
//get_all_categories_for($selected);
display_all_categories($selected);
//Searching all peoples for a category

?>
</body>
</html>