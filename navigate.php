<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
        <a href="description.html" target="main"><H1 border=1> <img src="favicon.gif"> Contitact</H1></a></p>
<div >
			<dl width=40%>                
			<dt ><H2><IMG src="images/_view.gif"> View</H2></dt>                
			<dd>
				<ul>
		 			<a target="main" href="./vap.php"> <img border=0 src="images/_view_all_contacts.gif"> All contacts</a><BR>
					<a target="main" href="./soc.php"> <img border=0 src="images/_view_all_categories.gif"> All categories</a>
<!-- 		 			<li><a target='main' href="./vacaa.php">View all cat/attrib</a></li> -->

				</ul>
			</dd>
		</dl>         	
</div>
<div>
			<dl width=40%>                
			<dt ><H2><img src="images/_add.gif"> Add</H2></dt>
			<dd >
				<ul>
		 			<a target='main' href="./aanc.php"><img border="0" src="images/_new_contact.gif"> Contact</a><BR>
					<a target='main' href="./aac.php"><img border="0" src="images/_new_category.gif"> Categorie</a>
				</ul>
			</dd>
		</dl>         	
</div>
<div>
			<dl width=40%>                
			<dt ><H2><img src="images/_search.gif"> Search</H2></dt>                
			<dd >
				<ul>
          <a target='main' href="./ss.php"><img border=0 src="images/_search_name.gif"> by First/Last Name</a><BR>
          <a target='main' href="./ks.php"> <img border=0 src="images/_search_name.gif"> by KeyWord</a><BR>
				</ul>
			</dd>
		</dl>         	
</div>
<div>
			<dl width=40%>                
			<dt ><H2><img src="images/_modify.gif">Modify</H2></dt>                
			<dd >
				<ul>        
          <a target='main' href="./rac.php"> <img border=0 src="images/_modify_category.gif"> A category name</a>
				</ul>
			</dd>
		</dl>         	
</div>
<?PHP 
/*<div>
			<dl width=40%>                
			<dt ><H2>Test</H2></dt>                
			<dd >
				<ul>
		 			<li><a target='main' href="./teststyle.php">Test the style</a></li>
				</ul>
			</dd>
		</dl>         	
</div>
*/
?>
<div>
			<dl width=60%>                
			<dt><H2><img src="images/_admin.gif"> Admin</H2></dt>                
			<dd >
				<ul>
		 		
<?PHP 	/* 
	<li><a target='main' href="./teststyle.php">E port the database</a></li>
            <li><a target='new' href="http://localhost/phpmyadmin/db_structure.php?db=peopledb">Create a new database</a></li>
          <li><a target='main' href="sadb.php">Change the database used</a></li>
  */ ?>
<?PHP include("TOOLS/CORE_DB_Functions.php"); $dbused=get_the_database_used();?>
		 			<a target='main' href="./cdbu.php"><img border=0 src="images/database.gif"> Change the database</a><BR>
					<a target='new' href="http://localhost/phpmyadmin/db_structure.php?db="<?PHP print "$dbused" ?>"><img border=0 src="images/_manage_database.gif"> Manage the database</a><BR>
		 			<a target='main' href="./vapr.php"><img border=0 src="images/_remove_contact.gif"> Remove one contact</a><BR>
					<a target='main' href="./rmac.php"><img border=0 src="images/_remove_category.gif"> Remove a category</a><BR>
				</ul>
			</dd>
		</dl>         	
</div>
</body>
</html>
