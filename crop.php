<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$pk=$_GET['pk'];
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>
<?PHP
	$contact=get_the_name_surname($pk);
?>	
<H3><BR><HR><font color="red">Are you sure you want to remove the contact:</font></H3>
<CENTER><H2><?PHP print "$contact";?></H2></CENTER>
<CENTER>
<TABLE><TR>
		<TD>
			<FORM action="rop.php" method="get">
			<INPUT type="hidden" name="pk" value="<?PHP print "$pk"; ?>">
			<INPUT type="submit" value="Yes">
			</FORM>
		</TD>
		<TD>
			<FORM action="vapr.php" method="get">
			<INPUT type="submit" value="No">
			</FORM>
		</TD>
	</TR>
</TABLE>
</BODY>
</HTML>