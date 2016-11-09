<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$name=$_GET['name'];
$surname=$_GET['surname'];
$knowby=$_GET['knowby'];
$relation=$_GET['kindofrelation'];
//print "checking if both name and surname are filled...\n";
if ($name =="" || $surname=="")
{
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="2;URL=./aanc.php">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>

<?PHP
print "<HTML><H2><font color=\"red\">ERROR: Both name and surname need to be filled properly</font></H2><HTML>\n";
exit();
}
// Checking if the name and surname doesn't exist /////////
if ( name_surname_exist($name, $surname) ==  "true" )
{
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="2;URL=./aanc.php">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>

<?PHP
print "<HTML><H2><font color=\"red\">ERROR: the contact $name / $s  urname already exist </font></H2><HTML>\n";exit();
}

///////////////////////////////////////////////////////////
$pk=insert_a_contact($name,$surname,$knowby,$relation);
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=./vop.php?pk=<?PHP print "$pk"; ?>">
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>