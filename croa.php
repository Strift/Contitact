<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$pk=$_GET['pk'];
$cat=$_GET['cat'];
$att=$_GET['att'];
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
<H3><BR><HR><font color="orange">Are you sure you want to remove the attribute:<?PHP print " $att"?></font></H3>
<!-- <CENTER><H2><?PHP print "$contact";?></H2></CENTER> -->
<CENTER>
<TABLE><TR>
		<TD>
			<FORM action="roa.php" method="get">
			<INPUT type="hidden" name="pk" value="<?PHP print "$pk"; ?>">
      <INPUT type="hidden" name="att" value="<?PHP print "$att"; ?>">
      <INPUT type="hidden" name="cat" value="<?PHP print "$cat"; ?>">
			<INPUT type="submit" value="Yes">
			</FORM>
		</TD>
		<TD>
			<FORM action="vop.php" method="get">
      <INPUT type="hidden" name="pk" value="<?PHP print "$pk"; ?>">
			<INPUT type="submit" value="No">
			</FORM>
		</TD>
	</TR>
</TABLE>
</BODY>
</HTML>