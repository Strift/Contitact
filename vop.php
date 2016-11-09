<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
	<title>"This page shows all details for a contact"</title>
</head>
<body>
<?PHP
include ("TOOLS/CORE_DB_Functions.php");
//print "This page shows all details for a contact";
$r_mode=$_GET['mode'];
$r_cat = $_GET['cat'];
$r_attr= $_GET['attr'];
$r_note= $_GET['note'];
$r_en=$_GET['en'];
$pk=$_GET['pk'];

$namesurname=get_the_name_surname($pk);
$knowby=get_the_related_contact($pk);
$knowname=$knowby['name'];
$knowpk=$knowby['pk'];

print "<div class=\"vop\">\n";
print "<TABLE cellspacing=0 cellpadding=0 width=95%><TR height=95%>\n";
// Display the link if this contact knows other contacts
if (get_related_contact($pk))
{print "<TD width=66%><a title=\"Change the current field\" href=\"uans.php?pk=$pk\"><H1><img border=0 src=\"images/_user_large.gif\"> $namesurname</H1></a><a href=varc.php?pk=$pk><img border=0 src=\"images/_all_related_contacts.gif\">view all contact knew by...</a></TD>\n";}
else
{print "<TD width=66%><a title=\"Change the current field\" href=\"uans.php?pk=$pk\"><H1><img border=0 src=\"images/_user_large.gif\"> $namesurname</H1></a></TD>\n";}

print "<TD align=\"right\"><H5>Knew by: <a href=\"vop.php?pk=$knowpk\" title=\"Show $knowname\" ><img border=0 src=\"images/_user_file.gif\"> $knowname</a></H5></TD>\n";
print "</TR>\n";
print "</TABLE>\n";
print "<HR width=\"100%\">\n";
/*$birthdate=get_birthdate($pk);
if ($birthdate!=""){print  "<h3>birthdate -$birthdate</H3><BR>\n";}*/
$all_cat = get_all_categories_existing_for($pk);
foreach($all_cat as $cat => $attr)
	{	
		/*if($cat=="birthdate"){continue;}*/
		
		if (is_array($attr) )
			{ $several_attr="yes"; $att=$attr[0];} else {$att=$attr;$attr=array($att);$several_attr="no";}		
			
		print "<a href=\"vocaa.php?cat=$cat\" title=\"View all about: $cat\"><H2><img border=0 src=\"images/_category.gif\"> $cat</H2></a>\n";
    //print "<a href=\"vocaa.php?cat=$cat\" title=\"View all about: $cat\"><H2><img src=\"ball.gif\">$cat</H2></a>\n";
				for ($index =0 ; ($att=$attr[$index]) != "";$index++)
								{	
									$pknote=get_pknote_for($cat,$att,$pk);
									$occ=get_number_of_occurence_for($cat , $att);									
									print "<TABLE cellspacing=0 cellpadding=0 align=center width=95% noborder>\n";
									if ($r_mode=="change_att" && $r_cat==$cat && $r_attr==$att)
									{ // EDITION ATTRIBUT .
                  
				?>				
          <TD>	
								<form target="_self" enctype="text/plain" method="get" action="uaa.php" name="update_attr">
									<input type=hidden name=pk value="<?PHP print "$pk"; ?>">
									<input type=hidden name=cat value="<?PHP print "$cat"; ?>">
									<input maxlength="60" <?PHP print "value=\"$r_attr\""; ?> alt="No special characters"  title="No special characters" size="40" name="att">										
								  	<input type="submit" value="Change" id="buttonGo" />
								</form>
					</TD>
				<?PHP
									}
									else
									{
										print "<TD width=2%><a title=\"Edit the current attribute\" href=\"vop.php?mode=change_att&pk=$pk&attr=$att&cat=$cat\"><img border=0 src=\"images/_edit.gif\"></a></TD>";
                    print "<TD width=2%><a title=\"Delete the current attribute\" href=\"croa.php?pk=$pk&cat=$cat&att=$att\"><img border=0 src=\"images/_remove_attribute.gif\"></a></TD>";
                    print "<TD width=25%><H3 class=\"wood\">$att";
										// If several peoples with the same occurence
										if ($occ == 1)
										print "</H3></TD>\n";
										else
										print "<a href=\"vocap.php?cat=$cat&attrib=$att\" target=\"main\" title=\"Show all peoples with the att: $att\" > ($occ)</a></H3></TD>\n";
									}
	
									if (  ( ($note=get_the_note_for($cat,$att,$pk)) != "") && ($r_mode!="add" && $r_mode !="update")  )
									{ // DISPLAY THE NOTE IF NOT ON EDIT MODE
										$htmlnote=htmlspecialchars($note);
										$htmlnote=nl2br($htmlnote);
										print "<TD width=60% height=3% align=left><H4>$htmlnote</H4></TD>\n";
										print "<TD width=10% height=3%><a href=\"vop.php?pk=$pk&mode=update&cat=$cat&attr=$att\"><H5><IMG border=0 src=\"images/_add_note.gif\"> Change the note</H5></a></TD>\n</TABLE>";										
									}
									elseif ( ( ($note=get_the_note_for($cat,$att,$pk)) == "") && ($r_mode!="add" && $r_mode !="update") )
									{ // THERE IS NO NOTE
										print "<TD width=60% height=3% align=left></TD>\n";
										print "<TD width=70% height=3% align=right><a href=\"vop.php?pk=$pk&mode=add&cat=$cat&attr=$att\"><H5><IMG border=0 src=\"images/_add_note.gif\">Add a note</H5></a></TD>\n<TR>\n</TABLE>";
									}
									if (($r_mode=="add" || $r_mode =="update") && $r_cat=="$cat" && $r_attr=="$att")
									{ // CHANGE OR ADD A NOTE
		?>							<TR><TD>
									<form target="_self" enctype="text/plain" method="get" action="iann.php" name="addnote">
										<input type=hidden name=pk value="<?PHP print "$pk"; ?>">
										<input type=hidden name=cat value="<?PHP print "$cat"; ?>">
										<input type=hidden name=pknote value="<?PHP print "$pknote"; ?>">
										<textarea cols="60" rows="10" name="note"><?PHP if ($r_mode=="update"){print "$note";}?></textarea>					
                    <BUTTON name="submit" value="submit" type="submit">Save <IMG src="images/_add_button.gif"></BUTTON>								  
									</form></TD></TR>
	            <?PHP
									
									}
								}
	}
	print "<HR>";
	if ($r_mode=="add_cat")
	{//print "Exisiting cat:<BR>\n";
		?>		
		<form target="_self" method="get" action="iaca.php" name="addcat">
			<input type=hidden name=pk value="<?PHP print "$pk"; ?>">
			Categorie
			<select size="1" name="cat">
				<?PHP
				foreach (get_all_categories() as $a_cat)
				{ print "<OPTION value=\"$a_cat\">$a_cat</OPTION>\n";}?>
					</select> Value <input maxlength="200" size="32" name="att" value="">
          <BUTTON name="submit" value="submit" type="submit">Add <IMG src="images/_add_button.gif"></BUTTON>
	  </form>
	  <?PHP		
	}elseif($r_mode =="")
		{	print "<TABLE cellspacing=0 cellpadding=0><TR><TD>";
		//print "<a href=\"vop.php?mode=add_cat&pk=$pk\"><H5>Add categorie/attribut</H5></a>";
    print "<a href=\"vop.php?mode=add_cat&pk=$pk\"><IMG border=0 src=\"images/_s_add.gif\"> Add categorie/attribut</IMG></a>";
		print "</TD></TR></TABLE>\n";}
		
	print "</div>";
	
?>
</body>
</html>