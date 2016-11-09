<html>
<head>
	<link href="./STYLE/style.css" rel="stylesheet" type="text/css">
	<!-- <link href="./MODEL/style.css" rel="stylesheet" type="text/css"> !-->
	<META http-equiv="refresh" content="60">
<script type="text/javascript">

window.onload=montre;
function montre(id) {
var d = document.getElementById(id);
	for (var i = 1; i<=10; i++) {
		if (document.getElementById('smenu'+i)) {document.getElementById('smenu'+i).style.display='none';}
	}
if (d) {d.style.display='block';}
}
</script>