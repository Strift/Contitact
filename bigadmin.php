<HTML>
<BODY>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
function Create_Empty_Database()
{
	$dbused=get_the_database_used();
	//$dbused=chop($dbused);
	$link = mysql_connect('localhost', 'contitact', 'G9ZBwhwD');
	if (!$link) {
	     die('Impossible de se connecter : ' . mysql_error());
	}
  
//	$sql="CREATE DATABASE `$dbused` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci";

//	$result = mysql_query($sql) or die("<blockquote>[NOk] Database already created or connection to Mysql failed</blockquote>");

  	mysql_select_db($dbused) or die ("Can't select the db $dbused...");

  	print "<blockquote>[Ok] database $dbused. created</blockquote>";

  $sql="CREATE TABLE `onepeople` (
  `Pk` bigint(20) NOT NULL auto_increment,
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Birthdate` date NOT NULL default '0000-00-00',
  `KnowBy` bigint(20) NOT NULL default '0',
  `KindOfRelationship` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`Pk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=259";

  $result = mysql_query($sql) or die("<blockquote>[NOk]  Table OnePeople already created or connection to Mysql failed</blockquote>");

  print "<blockquote>[Ok] table onepeople created</blockquote>";

}
print "Creating the database...<BR>";
Create_Empty_Database();

?>


