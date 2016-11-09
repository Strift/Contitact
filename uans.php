<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<BR><BR><H2><img src="images/_add_user_large.gif"> Update a contact</H2>
<body>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$pk=$_GET['pk'];
$name=get_the_name($pk);
$surname=get_the_surname($pk);
?>
<div class="s">
<form method="GET" action="uac.php">

	<input name="pk" type="hidden" value="<?PHP print "$pk" ?>"></input>
	
<H2>First Name (Prenom)</H2>
	<input name="surname" type="text" size="70" value="<?PHP print"$surname"?>"></input>
<H2>Last Name (Nom)</H2>
<input name="name" type="text" size="70" value="<?PHP print"$name"?>"></input>
<H2>Related contact</H2>

	<select name="knowby">
	<?PHP
	
		$AP=get_all_peoples();
		$knowbypk=	get_the_pk_of_related_contact_pk($pk);
		foreach ($AP as $namesurname => $kpk)
		{
		if ($kpk!=$knowbypk)
			{
				print "<option value=$kpk>$namesurname</option>\n";
			}else{
				print "<option selected value=$kpk>$namesurname</option>\n";
			}		
		}
		?>
		

	<?PHP
/*	
</select>
		<H2>Kind of relation</H2>
	<select name="relation">
	$relation=get_all_kinds_of_relation(); $index=0;
		foreach ($relation as $rel)
		{
			print "<OPTION value=\"$rel\">$rel</OPTION>";
		}
    */
		?>
	</select>
 
	<BR><BR>
	</input>
  	<!-- <H2><input type="submit" value="Update this contact"></H2> -->
    <BUTTON name="submit" value="submit" type="submit"> Update Contact <IMG src="images/_update.gif"></BUTTON>
</form>
	</div>
</html>	