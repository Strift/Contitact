<?PHP
///////////////////////////////////////////////////////////////////////////////
//This function receives the name of the database used and display the 
//list of database and then change the database to use
///////////////////////////////////////////////////////////////////////////////
function get_the_database_used()
{
	//Open the file then read the line starting with used:
	$index=0;$dbused="";
   	$FILENAME = "./TOOLS/all_databases.conf";
	$result = fopen( $FILENAME , "r");
		if ($result == FALSE)
		{
                 	print "<BR>The file : $FILENAME can't be found !!! <BR>";
		}
                while ($Line = fgets($result, 10000))
		{
			$Line=chop($Line);
                 	if (preg_match ("/used/" , $Line) )
			{
                         	preg_match("/used\:(.*)$/", $Line, $version);
				$dbused = $version[1];
                          	//print "<BR>the database used is $dbused\n<BR>";
			}
		}
		fclose($result);
		if ($dbused==""){die ("BLOCKING ERROR the file $FILENAME doesn't contain the required field:<BR>used:peopledb<BR>Please create it !!!<BR> ");}
		return ($dbused);
}
////////////////////////////////////////////
function get_all_databases()
{
	$index=1;$dbused="";$dbs[]=0;
   	$FILENAME = "./TOOLS/all_databases.conf";
	$result = fopen( $FILENAME , "r");

		if ($result == FALSE)
		{
                 	print "<BR>The file : $FILENAME can't be found !!! <BR>";
		}

                while ($Line = fgets($result, 10000))
		{
			//print "pushed<BR>";
                 	if (preg_match ("/used/" , $Line) )
			{
                         	preg_match("/used\:(.*)$/", $Line, $version);
				$dbs[0]= $version[1];
			}
			else
			{
				$dbs[$index]=chop($Line);
				$index++;
			}
		}
		fclose($result);
		return ($dbs);
}
///////////////////////////////////////////////////////////////////////////////////////////
function change_the_database_used_to($dbused)
{
	$ALL_DB=get_all_databases();
	$FILENAME = "./TOOLS/all_databases.conf";
	$result = fopen( $FILENAME , "w");
	if ($result == FALSE)
	{
        	print "<BR>The file : $FILENAME can't be found !!! <BR>";
	}
	fputs($result, "used:$dbused\n");
	$index=0;
	while ($ALL_DB[$index])
	{
		if ($ALL_DB[$index] != $dbused)
		 {fputs($result, "$ALL_DB[$index]\n");}
		$index++;
	}
	fclose($result);
}
////////////////////////////////////////////////////////////////////////////////////////////
	
function display_the_databases($dbused)
{
	connectdb();
	print "The database used is $dbused<BR>\n";
}
function change_the_database_used($dbused)
{
	//Open the file
	//Read which is the database used
	//Display all databases (used and not used)
	$index=0;
   	$FILENAME = "./TOOLS/all_databases.conf";
	$result = fopen( $FILENAME , "r");

		if ($result == FALSE)
		{
                 	print "<BR>The file : $FILENAME can't be found !!! <BR>";
		}
                while ($Line = fgets($result, 10000))
		{
                 	if (preg_match ("/Used/" , $Line) )
			{
                         	preg_match("/Used\=(.*)$/", $Line, $version);
	                  $dbused = $version[0];
                          //print "<BR>dbused= $dbused\n<BR>";
			}
		}
                while ($Line = fgets($result, 10000))
	

	$Line = fgets($result, 1000); 
	print "Line = $Line<BR>\n";
        while ($Line = fgets($result, 1000))
        {
		print "Reading line...<BR>\n";
        	$FILE[$index++]=$Line;
		print "Reading line...<BR>\n";
    	}
    	fclose($result);

    	$index=0;
    	//$result =fopen ($FILENAME, "w");
	print "out the while...<BR>";

    	while ($FILE[$index])
    	{
		print "In the while...<BR>";
    		$version="";
	    	preg_match("/Used\=(.*)$/", $FILE[$index], $version);
    		if ($version[1] != "")
		{
			print "Used :$version[1]<BR>";
			//	fputs($result, $FILE[$index]);
		}
    		$index++;
    	}
    	fclose($result);    		
}
///////////////////////////////////////////////////////////////////////////////
function get_the_databases_available()
{
   	$FILENAME = "./TOOLS/all_databases.conf";
		$index = 0;
		$result = fopen( $FILENAME , "r");
		if ($result == FALSE)
		{print "<BR>The file : $FILENAME can't be found !!! <BR>";}
    while ($Line = fgets($result, 10000))
		{
                 	if (preg_match ("/Available/" , $Line) )
			{
                         	preg_match("/Available\=(.*)$/", $Line, $version);
				                  $dbavailable[$index++] = $version[1];
			}
		} 
                return ($dbavailable);
}
////////////////////////////////////////////////////////////////////////////// 
function connectdb()
{
	$link = mysql_connect('localhost', 'root', '');
//	$link = mysql_connect('localhost', 'contitact', 'G9ZBwhwD');


	if (!$link) {
     die('Impossible de se connecter : ' . mysql_error());
	}
  	$dbused=get_the_database_used();
	mysql_select_db($dbused)     or     die ("<BR><font color=orange size=10>Connection failed to database... Please check if Mysql is running and check if the database $dbused is created...<BR>else: <a href=\"bigadmin.php\">Call Bigadmin and then click on back !!!</a>");
//	$charset = mysql_client_encoding($link);
//	echo "Le jeu de caract?res actuel est : $charset\n";
	
//	print ("<H2>Connected to $dbused</H2>");
}
///////////////////////////////////////////////////////////////////////////////
function get_all_categories()
	{		
			connectdb();
  			$dbused=get_the_database_used();
			$result = mysql_list_tables("$dbused");
			$num_rows = mysql_num_rows($result);
			for ($i = 0; $i < $num_rows; $i++) 
			{if  ( mysql_tablename($result, $i) == 'onepeople') continue;
			$AT[$i] =   mysql_tablename($result, $i);}
			return ($AT);
	}	
///////////////////////////////////////////////////////////////////////////////
	/* This function returns all attributes for a category */
	function get_all_attributes($the_category)
	{
		connectdb();
		$returned = array();
		//print ("Received category is : $the_category...<BR>\n");
		// First get the row name we expect the second row for the name 
		// and the third for not, if it exist
		
		//Get the field name
		//$result = mysql_query($sql);
		
		$sql = "SELECT * FROM `$the_category` ";
		$result = mysql_query($sql) or die("get_all_attributes::Query  1 failed");
	 	$line = mysql_fetch_field($result,2);// The second row contains the column name
    	$att_name = $line->name;
    	$sql = "SELECT `$att_name`, COUNT(*) FROM `$the_category` GROUP BY `$att_name`";
		//$sql = "SELECT `$att_name`, COUNT(*) FROM `V?lo` GROUP BY `$att_name`";
    	$result = mysql_query($sql) or die("get_all_attributes::Query 2 failed");
    	while ($line = mysql_fetch_assoc($result))
    	{
    		$att=$line[$att_name];
    		$occ= $line['COUNT(*)'];
//    		print "Attribut : $att / $occ...<BR>";
			$returned[$att] = $occ;
		}
		return($returned);
		
  	}
///////////////////////////////////////////////////////////////////////////////
  	function get_number_of_occurence_for($cat,$attr)
  	{
  		connectdb();
//  		$sql = "SELECT COUNT(*) FROM $cat where `$cat`LIKE $attr";
		$sql = "SELECT COUNT(*) FROM `$cat` WHERE `$cat` LIKE CONVERT(_utf8 \"$attr\" USING latin1) COLLATE latin1_swedish_ci";
//		$sql = "SELECT count(*) FROM `onepeople`"; 
    	$result = mysql_query($sql) or die("get_number_of_occurence_for::Query failed");
    	while ($line = mysql_fetch_assoc($result))
    	{
    		$occ= $line['COUNT(*)'];
			return( $occ );
		}
		return($returned);
	}  	
///////////////////////////////////////////////////////////////////////////////
	function get_the_number_of_peoples()
	{
      connectdb();
			$sql = "SELECT count(*) FROM `onepeople`"; 
			$result = mysql_query($sql) or die("get_the_number_of_peoples::Query failed");
			while ($line = mysql_fetch_assoc($result))	
			{
				foreach ($line as $key =>$val )
				{	$occ= $line[$key];}
			}
			return ($occ);
	}
///////////////////////////////////////////////////////////////////////////////
	function get_the_name($pk)
	{
		connectdb();
		$sql = "SELECT `Name` FROM `onepeople` WHERE `Pk` =$pk ";
		$result = mysql_query($sql) or die("get_the_name_surname::Query failed");
	
		while ($line = mysql_fetch_assoc($result))	
		{
			foreach ($line as $key => $val)
			{
//				print "Keys is $key ";
				if ($key=="Name"){$Name=$val;}
//				if ($key=="Surname"){$Surname=$val;}
//				print "Val is $val<BR>";
			}
		}		
		return("$Name");
	}
///////////////////////////////////////////////////////////////////////////////
	function get_the_surname($pk)
	{
		connectdb();
		$sql = "SELECT `Surname` FROM `onepeople` WHERE `Pk` =$pk ";
		$result = mysql_query($sql) or die("get_the_name_surname::Query failed");
	
		while ($line = mysql_fetch_assoc($result))	
		{
			foreach ($line as $key => $val)
			{
//				print "Keys is $key ";
//				if ($key=="Name"){$Name=$val;}
				if ($key=="Surname"){$Surname=$val;}
//				print "Val is $val<BR>";
			}
		}
		return("$Surname");
	}
///////////////////////////////////////////////////////////////////////////////
	function get_the_name_surname($pk)
	{
		connectdb();
		$sql = "SELECT `Name`,`Surname` FROM `onepeople` WHERE `Pk` =$pk ";
		$result = mysql_query($sql) or die("get_the_name_surname::Query failed");
	
		while ($line = mysql_fetch_assoc($result))	
		{
			foreach ($line as $key => $val)
			{
//				print "Keys is $key ";
				if ($key=="Name"){$Name=$val;}
				if ($key=="Surname"){$Surname=$val;}
//				print "Val is $val<BR>";
			}
		}		
		return("$Name $Surname");
	}
///////////////////////////////////////////////////////////////////////////////
	function get_the_pk_of_related_contact_pk($pk)
	{
		// The function receives the current pk and returns the name surname of the k
		connectdb();
		$sql = "SELECT `KnowBy` FROM `onepeople` WHERE `Pk` =$pk ";
		$result = mysql_query($sql) or die("get_the_name_surname::Query failed");
		//
		while ($line = mysql_fetch_assoc($result))	
		{
			foreach ($line as $key => $val)
			{
				return("$val");
			}
		}
	}					
///////////////////////////////////////////////////////////////////////////////	
/*function get_birthdate($pk)
	{connectdb();
	$sql = "SELECT `birthdate` FROM `birthdate` WHERE `PeopleLink`=$pk";
	$result = mysql_query($sql) or die("get_birthdate::Query failed");
	$line = mysql_fetch_assoc($result);
	return($line['birthdate']);}
*/
function get_birthdate($pk)
	{return(0);}

///////////////////////////////////////////////////////////////////////////////	
/*
	{
		$line=0;		$index=0;
		$ac = get_all_categories();
//		print "<BR>pk is $pk...<BR>";
		foreach($ac as $cat)
		{
			
//			print "Working on $cat...<BR>\n";
			if ($cat != "onepeople")
			{
					$sql = "SELECT * FROM `$cat` WHERE `PeopleLink` = $pk"; 
					$result = mysql_query($sql) or die("get_all_categories::Query failed");	
					while ($line = mysql_fetch_assoc($result))	
					{
						foreach ($line as $key => $val)
						{
//						print "Keys is $key ";
//						print "Val is $val<BR>";
						}						
					}
			}
		}
	}
  */
///////////////////////////////////////////////////////////////////////////////
function get_nb_of_attributes_for_category($cat)
{
	$sql = "SELECT COUNT(*) FROM `$cat`";
	connectdb();
	$result = mysql_query($sql) or die("get_nb_of_attributes_for_category::Query failed");	
	while ($line = mysql_fetch_assoc($result))	
	{
		foreach ($line as $key =>$val )
			{	$occ= $line[$key];}
	}
	return ($occ);
}		
///////////////////////////////////////////////////////////////////////////////
function get_all_kinds_of_relation()
{
	$sql = "SELECT DISTINCT `KindOfRelationship` FROM `onepeople` ORDER BY `KindOfRelationship` ";
	connectdb();
	$index=0;
	$result = mysql_query($sql) or die("get_all_kinds_of_relation::Query failed");	
	while ($line = mysql_fetch_assoc($result))	
	{
		$returned[$index++]=$line['KindOfRelationship'];
	}
	return ($returned);
}
///////////////////////////////////////////////////////////////////////////////
	function display_all_categories($pk)
{			$line=0;		$index=0; $cat_displayed=false;
		$ac = get_all_categories();
		print "<BR>pk is $pk...<BR>";
		foreach($ac as $cat)
		{
//			$sql = "SELECT * FROM `hobbies` WHERE `PeopleLink`=8 "; 
			if ($cat != "onepeople")
			{
					$sql = "SELECT * FROM `$cat` WHERE `PeopleLink` = $pk"; 
					$result = mysql_query($sql) or die("display_all_categories::Query failed");	
					while ($line = mysql_fetch_assoc($result))	
					{
						if ($cat_displayed==false)
							{print "<H3>cat: $cat</H3>\n";$cat_displayed=true;}

						foreach ($line as $key => $val)
						{
							if ($key != "Pk" && $key != "PeopleLink" )
							{
								print "Val $val<BR>";
								print "Call the get_all_peoples_with_the_same_attribut with $cat $val...<BR>";
								get_all_peoples_with_the_same_attribut($cat , $val ,$pk);
							}
						}						
					}

			}
		$cat_displayed=false;
		}
	}
///////////////////////////////////////////////////////////////////////////////
	function get_all_peoples_with_the_same_attribut($cat, $attribute,$pk)
	{
//		if ($pk==null){$pk=0;}
//		print ("Working on ...$cat... searching for ...$attribute...<BR>\n");		
		$index=0;
		connectdb();
		$sql = "SELECT `PeopleLink` FROM `$cat` WHERE `$cat` LIKE CONVERT(_utf8 \"$attribute\" USING latin1) COLLATE latin1_swedish_ci ";
	//	$sql = "SELECT `PeopleLink` FROM `$cat` WHERE `$cat` = CONVERT(_utf8 \"$attribut\" USING latin1) COLLATE latin1_swedish_ci";
		$result = mysql_query($sql) or die("get_all_peoples_with_the_same_attribut::Query failed !!!<BR>");
	//	print "Query executed..<BR>\n";
			while ($line = mysql_fetch_assoc($result))	
			{
				foreach ($line as $key => $val)
				{
	//							print "Key $key : Val $val<BR>";
//								if ($val!=$pk) {get_the_name_surname($val);}								
								$returned[$index++]=$val;
				}
			}		
			return($returned);
	}	
///////////////////////////////////////////////////////////////////////////////
function get_all_categories_existing_for($pk)		
{
	connectdb();
	$returned=array();
	if (count(get_all_categories()) == 0) {return(0);}
	foreach(get_all_categories() as $cat)
	{	
		if ($cat=="onepeople"){continue;}
		$sql = "SELECT `$cat` FROM `$cat` WHERE `PeopleLink` = $pk";
		$result = mysql_query($sql) or die("get_all_categories_existing_for::Query failed !!!<BR>");
		if  ( mysql_num_rows($result)  >1 )
		{
			$all_cat;
			$index=0;
			while ($line = mysql_fetch_assoc($result) )
					{if ($line[$cat]!="" ){$all_cat[$index++]=$line[$cat];} }
			$returned[$cat]=$all_cat;
					
	}
	else
	{
			$line = mysql_fetch_assoc($result);
			if ($line[$cat]!=""){$returned[$cat]=$line[$cat];}
	}

	} 

	return($returned);
}
///////////////////////////////////////////////////////////////////////////////
function get_all_peoples_filetered_by_letter($letter)
{
  if ($letter=="all") return(get_all_peoples());
  
  connectdb();
  $sql = "SELECT * FROM `onepeople` WHERE `Name` REGEXP CONVERT(_utf8 '^$letter' USING latin1) COLLATE latin1_swedish_ci ORDER BY `Name` ASC";
  $result = mysql_query($sql) or die("get_all_peoples::Query failed !!!<BR>");
   while($line = mysql_fetch_assoc($result))
	{
		$pk=$line['Pk'];
		$name = get_the_name_surname($pk);
		$returned[$name]=$pk;
	}
	return($returned);

  
  
}
///////////////////////////////////////////////////////////////////////////////
function get_all_peoples()
{
	connectdb();
	$returned=array();
	$sql = "SELECT `Pk`  ,`Name`, `Surname` FROM `onepeople` ORDER BY `Name`ASC";
	$result = mysql_query($sql) or die("get_all_peoples::Query failed !!!<BR>");
	while($line = mysql_fetch_assoc($result))
	{
		$pk=$line['Pk'];
		$name= $line['Name'] . " " . $line['Surname'];
// Patch to slightly improve the perf...
//		$name = get_the_name_surname($pk);
		$returned[$name]=$pk;
	}
	return($returned);
}
///////////////////////////////////////////////////////////////////////////////
function insert_a_contact($name,$surname,$knowby,$relation)
{
	connectdb();
	$sql = "INSERT INTO `onepeople` (`Pk`, `Name`, `Surname`, `Birthdate`, `KnowBy`, `KindOfRelationship`) VALUES (\"\", \"$name\", \"$surname\", \"0000-00-00\", \"$knowby\", \"$relation\")"; 
	$result = mysql_query($sql) or die("insert_a_contact::Query failed !!!<BR>");
	return(	mysql_insert_id());
	}
///////////////////////////////////////////////////////////////////////////////
function update_a_contact($pk,$name,$surname,$knowby,$relation)
{
	connectdb();
	$sql = "UPDATE `onepeople` set 	`Name`=\"$name\",
									`Surname`=\"$surname\",
									`KnowBy`=\"$knowby\" WHERE  
									`Pk`=\"$pk\"
									"; 
	$result = mysql_query($sql) or die("insert_a_contact::Query failed !!!<BR>");
	return(	$pk);
}
///////////////////////////////////////////////////////////////////////////////
function get_the_note_for($cat,$attr,$pk)
{
	connectdb();
	$sql = "SELECT `note` FROM `$cat` WHERE `PeopleLink` = $pk AND `$cat` LIKE CONVERT(_utf8 \"$attr\" USING latin1) COLLATE latin1_swedish_ci AND `note` != \"\" ";
	$result = mysql_query($sql) or die("get_the_note_for::Query failed !!!<BR>");
	$line = mysql_fetch_assoc($result);
	$note = $line['note'];
	return($note);
}
///////////////////////////////////////////////////////////////////////////////
function get_the_related_contact($pk)
{
	connectdb();
	$sql = "SELECT `KnowBy` FROM `onepeople` WHERE `Pk` = $pk";
	$result = mysql_query($sql) or die("get_the_related_contact::Query failed !!!<BR>");
	$line = mysql_fetch_assoc($result);
	$knowpk = $line['KnowBy'];
//	print "\$knowpk : $knowpk<BR>\n";
	$returned['pk']=$knowpk;
	$returned['name']=get_the_name_surname($knowpk);
	return($returned);
}
///////////////////////////////////////////////////////////////////////////////
function insert_a_note($pk,$cat,$note)
{
	connectdb();
//	$sql = 'UPDATE `work` SET `note` = ''Telephonie sur IP'' WHERE `Pk` = ''6'' LIMIT 1';
	$sql = "UPDATE `$cat` SET `note` = \"$note\" WHERE `Pk` = $pk";
	$result = mysql_query($sql) or die("insert_a_note::Query failed !!!<BR>");
}
///////////////////////////////////////////////////////////////////////////////
function get_pknote_for($cat,$att,$pk)
{
	connectdb();
	$sql = "SELECT `Pk` FROM `$cat` WHERE `PeopleLink` = $pk AND `$cat` LIKE CONVERT(_utf8 \"$att\" USING latin1) COLLATE latin1_swedish_ci";
	$result = mysql_query($sql) or die("get_pknote::Query failed !!!<BR>");
	$line = mysql_fetch_assoc($result);	
	return ($line['Pk']);	
}
///////////////////////////////////////////////////////////////////////////////
function insert_a_cat_att($pk,$cat,$att)
{
	connectdb();
  if ($cat!="")
  {
	$sql = "INSERT INTO `$cat` (`PeopleLink` ,  `$cat`) VALUES (\"$pk\", \"$att\")";
  }
  	$result = mysql_query($sql) or die("insert_a_cat_att::Insertion failed !!!<BR>");
}
///////////////////////////////////////////////////////////////////////////////
function create_a_cat($cat)
{
	connectdb();
	$sql = "CREATE TABLE `$cat` (`Pk` INT NOT NULL AUTO_INCREMENT,  `PeopleLink` INT NOT NULL,  `$cat` VARCHAR(250) NOT NULL,  `note` TEXT NOT NULL, PRIMARY KEY (`Pk`) )";
    $result = mysql_query($sql) or die("Creation of table failed !!!<BR>");
    }
///////////////////////////////////////////////////////////////////////////////
function update_an_attribut_for($pk,$cat,$att)
{
	connectdb();
	$sql = "UPDATE `$cat` SET `$cat` = \"$att\" WHERE `PeopleLink` = \"$pk\" LIMIT 1";
    $result = mysql_query($sql) or die("update_an_attribut_for $att faile::Query failed !!!<BR>");    
    
}	
///////////////////////////////////////////////////////////////////////////////
function remove_a_category($cat)
{
    connectdb();
    $sql=" DROP TABLE `$cat` ";
    $result= mysql_query($sql) or die("Can't remove the category: $cat !!!<BR>");
}
///////////////////////////////////////////////////////////////////////////////
function remove_a_contact($pk)
{
	connectdb();
	$sql = "DELETE FROM `onepeople` WHERE `Pk` = \"$pk\" LIMIT 1 ";
	$result = mysql_query($sql) or die ("The remove of $pk failed !!!<BR>");
	$returned=array();
	foreach(get_all_categories() as $cat)
	{	
		if ($cat=="onepeople"){continue;}
		$sql = "DELETE FROM `$cat` WHERE `PeopleLink` = $pk";
		mysql_query($sql);
	}
}
///////////////////////////////////////////////////////////////////////////////
function remove_an_att_on_a_contact($pk,$cat,$att)
{
  connectdb();
  $sql = "DELETE FROM `$cat` WHERE `PeopleLink` = \"$pk\" AND `$cat` LIKE CONVERT(_utf8 \"$att\" USING latin1) COLLATE latin1_swedish_ci  LIMIT 1";
  $result = mysql_query($sql) or die ("The remove of $att failed !!!<BR>");
  
}
  
///////////////////////////////////////////////////////////////////////////////
function name_surname_exist($name, $surname)
{
 // This checks if the current name and surname exists ?
  connectdb();
  $sql = "SELECT `Pk` FROM `onepeople` WHERE `Name` LIKE CONVERT(_utf8 \"$name\" USING latin1) COLLATE latin1_swedish_ci AND `Surname` LIKE CONVERT(_utf8 \"$surname\" USING latin1) COLLATE latin1_swedish_ci ";
  $result = mysql_query($sql) or die ("name_surname_exist::PB The name is $name and the surname is $surname !!! Check It<BR>
  SELECT 'Pk' FROM 'onepeople' WHERE 'Name' LIKE CONVERT(_utf8 \"$name\" USING latin1) COLLATE latin1_swedish_ci
  ");
  if( mysql_fetch_assoc($result) )
    	{
        return(true);
      }else{
        return(false);
      }
}
 
///////////////////////////////////////////////////////////////////////////////
function rename_a_category($cat,$newcat)
{
	connectdb();
//	$sql = "RENAME TABLE `peopledb`.`nationalité`  TO `peopledb`.`nationalitél`;
	$sql = "RENAME TABLE `$cat`  TO `$newcat`";		
	$result = mysql_query($sql) or die ("The rename of cat $cat failed !!!<BR>");
	$sql="ALTER TABLE `$newcat` CHANGE `$cat` `$newcat` VARCHAR( 250 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL";
	$result = mysql_query($sql) or die ("The rename of the field $newcat failed !!!<BR>");
}
///////////////////////////////////////////////////////////////////////////////
function search_name_or_surname_and_display_result($ss,$image)
{  
  connectdb();
  $sql = "SELECT * FROM `onepeople` WHERE `Name` LIKE CONVERT(_utf8 '%$ss%' USING latin1) COLLATE latin1_swedish_ci OR `Surname` LIKE CONVERT(_utf8 '%$ss%' USING latin1) COLLATE latin1_swedish_ci ORDER BY `Name` ASC";
  $result = mysql_query($sql) or die ("The query $sql failed !!!<BR>");
  if ( mysql_num_rows($result) != 0)
    {print "<div>";
    print "<dl width=40%><dt><H2>$cat</H3></dt><dd><ul>\n"; }
    while ($line= mysql_fetch_assoc($result))
    {      
      if ($line !="")
      {
          //print "One result found for cat $cat the line is $line!!!<BR>\n";
            $val = $line['Pk'];
            print "<a href=\"vop.php?pk=$val\"><img border=0 src=\"$image\"> ";
            print get_the_name($val);
            print " ";
            print get_the_surname($val);
            print "</a><BR>";            
        }
      }
      if (mysql_num_rows($result) != "")
        {print "</ul></dd></dt></div>\n";}
} 

///////////////////////////////////////////////////////////////////////////////
function search_keyword_on_all_cat_and_display_result($ks,$user,$catimg)  
{
  connectdb();
  $AC = get_all_categories();
  $nb =count($AC);
  if ($nb==0){die("");} 
  foreach ($AC as $cat)
	{
//  print "the cat is $cat<BR>";
    $sql = "SELECT * FROM `$cat` WHERE `$cat` LIKE CONVERT(_utf8 '%$ks%' USING latin1) COLLATE latin1_swedish_ci OR `note` LIKE CONVERT(_utf8 '%$ks%' USING latin1) COLLATE latin1_swedish_ci";
    $result = mysql_query($sql) or die ("The query $sql failed !!!<BR>");  
    
    if ( mysql_num_rows($result) != 0)
    {print "<div>";
    print "<dl width=40%><dt><H2><img src=\"$catimg\"> $cat</H3></dt><dd><ul>\n"; }

    while ($line= mysql_fetch_assoc($result))
    {      
      if ($line !="")
      {
          //print "One result found for cat $cat the line is $line!!!<BR>\n";
            $val = $line['PeopleLink'];
            print "<a href=\"vop.php?pk=$val\"><img border=0 src=\"$user\"> ";
            print get_the_name($val);           
            print " ";
            print get_the_surname($val);
            print "</a><BR>";            
        }
      }
      if (mysql_num_rows($result) != "")
        {print "</ul></dd></dt></div>\n";}
    }
  }
///////////////////////////////////////////////////////////////////////////////
function  get_related_contact($pk)
{
  connectdb();

  $sql ="SELECT * FROM `onepeople` WHERE `KnowBy` = $pk";
  $result = mysql_query($sql) or die ("The query $sql failed !!!<BR>");  
  if ( mysql_num_rows($result) == 0)
    {return(false);}
    else
    {return(true);}
}
///////////////////////////////////////////////////////////////////////////////
function  get_all_related_contact($pk,$user)
{
  connectdb();
  $sql ="SELECT * FROM `onepeople` WHERE `KnowBy` = $pk ORDER BY Name";
  $result = mysql_query($sql) or die ("The query $sql failed !!!<BR>");  
    if ( mysql_num_rows($result) != 0)
    {
    while ($line= mysql_fetch_assoc($result))
    {      
      if ($line !="")
      {
          //print "One result found for cat $cat the line is $line!!!<BR>\n";
            $val = $line['Pk'];
            print "<a href=\"vop.php?pk=$val\"><img border=0 src=\"$user\"> ";
            print get_the_name($val);           
            print " ";
            print get_the_surname($val);
            print "</a><BR>";            
        }
      }
      }
}
///////////////////////////////////////////////////////////////////////////////
function get_number_of_element_on_a_category($cat)
{
  connectdb();
  $sql = "SELECT COUNT(DISTINCT `$cat`) FROM `$cat` WHERE 1 ";
  $result = mysql_query($sql) or die ("The query $sql failed !!!<BR>");    
  while ($line= mysql_fetch_assoc($result))
  {      
      foreach ($line as $key =>$val )
      {
        return ($val);
      }        
   }
  //return($val );
}

///////////////////////////////////////////////////////////////////////////////
function get_number_of_all_related_contact($pk)
{
  connectdb();
  $sql ="SELECT COUNT(*) FROM `onepeople` WHERE `KnowBy` = $pk";
  $result = mysql_query($sql) or die ("The query $sql failed !!!<BR>");  
    	while ($line = mysql_fetch_assoc($result))
    	{
    		$occ= $line['COUNT(*)'];
	}
	return($occ);

}
///////////////////////////////////////////////////////////////////////////////
function display_all_first_letters_of_name()
{
  connectdb();
  $sql = "SELECT `Name` FROM `onepeople` ORDER BY `Name` ASC";
  $result = mysql_query($sql) or die ("The query $sql failed !!!<BR>"); 
  if ( mysql_num_rows($result) != 0)
    {
      $lastletter="All";    
      while ($line= mysql_fetch_assoc($result))
      {      
        $val = $line['Name'][0];                    
        if(!strcasecmp($val ,$lastletter))          {$lastletter=$val;continue  ;}        else          {$lastletter=$val;}      
        print "<a href=\"vap.php?letter=$val\"> $val </a>\n";
        
      }
    }
  }
?>
