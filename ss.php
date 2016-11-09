<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$ss=$_GET['keyword'];
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>
  <BR><BR><BR>
  <H2>Search on all First Name and Last Name </H2>
  	<div class="s">
    <form method="GET" action="ss.php">	  
    
	  <input name="keyword" type="text" size="70" <?PHP if ($ss!="") print "value=\"$ss\"";?></input>
    <BUTTON border=2 name="submit" value="submit" type="submit"><IMG src="images/_search_name.gif"> Search</BUTTON>
  	<!--<input type="submit" value="Search">-->
</form>
</div>
<?PHP
  if ($ss!="")
    { 
      print "Search result for $ss<BR>\n";    
      $RESULT = search_name_or_surname_and_display_result($ss,"images/_user_file.gif");      
      }
      ?>