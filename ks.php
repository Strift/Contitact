<?PHP
include ("TOOLS/CORE_DB_Functions.php");
$ks=$_GET['keyword'];
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html;charset=iso-8859-1">
<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body>
<BR><BR><BR>
  <H2>Searching by keyword</H2>
  	<div class="s">
    <form method="GET" action="ks.php">	  
	  <input name="keyword" type="text" size="70" <?PHP if ($ks!="") print "value=\"$ks\"";?></input>
    <BUTTON border=2 name="submit" value="submit" type="submit"><IMG src="images/_search_name.gif"> Search</BUTTON>
  	<!--<input type="submit" image src="images/_search_large.gif"  value="Search ">-->
</form>
</div>
<?PHP
  if ($ks!="")
    { 
      print "Result of searching for keyword $ks<BR>\n";    
      $RESULT = search_keyword_on_all_cat_and_display_result($ks,"images/_user_file.gif","images/_category.gif");
      
      }
      ?>
           
</body>
</html>      
