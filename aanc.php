<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table border='0' cellspacing='0' cellpadding='0' width='100%'>
<TR border='1'>
<TD>
<BR><BR><H2><img src="images/_add_user_large.gif"> Add a new contact on Contitact</H2>
</TD>
</TR>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
?>
  
	<div class="s">
  <form method="GET" action="ianc.php">
  <TR><TD>
  <H2>First Name (Prenom)</H2>
  </TD></TR>
  <TR><TD>
	<input name="surname" type="text" size="70"></input>
  <H2>Last Name (Nom)</H2>
  </TD></TR>
  <TR><TD>
	<input name="name" type="text" size="70"></input>
	<H2>Related contact</H2>
  </TD></TR>
  <TR><TD>
	<select name="knowby">
	<?PHP
	
		$AP=get_all_peoples();
		foreach ($AP as $namesurname => $pk)
		{
		print "<option value=$pk>$namesurname</option>";
		}
		?>
		</select>
    </TD></TR>
    <TR><TD>
	</input>
  	<H2><BR>
    <BUTTON name="submit" value="submit" type="submit">Add <IMG src="images/_add_button.gif"></BUTTON>
    <!-- <input type="submit" value="Add"> -->
    </H2>
        </TD></TR>
        </TABLE>
</form>
	</div>
</html>	
