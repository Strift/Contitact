<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
	<title>"This page shows all details for a contact"</title>
</head>
<body>
<?PHP

include ("TOOLS/CORE_DB_Functions.php");
$ALL_DB = get_the_databases_available();
$DBU=get_the_database_used();
$index=0;
?>
	<BR>
	<H2>The current database is <?PHP print "$DBU" ?></H2>
	<BR><BR>
  <H2>Please select one database from the list</H2>
  <UL>
	<?PHP
 	   while ( ($db = $ALL_DB[$index++]) != "")
    	{ 
      		print "<BR><LI>Database:<a href=\"cdbu.php?db=$db\"> $db</a>\n";
  		}
    ?>
    </UL>

  
  