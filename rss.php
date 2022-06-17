<link rel="stylesheet" href="index.css">
<style>
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  text-align:center;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}

.sidenav a:hover{
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span> 
	<p><?php echo $obj->author; ?></p>
	<p>All rights reserved.</p>
	<p><br></p>
	<p>The Beauty-Zones software is licensed under the open source (revised) BSD license, one of the most flexible and liberal licenses available. 
	Third-party open source libraries we include in our download are released under their own licenses.</p>
	<p><br></p>
	<h2  class="animate__animated animate__swing"><?php echo $obj->howmanyusers(); ?> uživateľov je k dnešnému dňu zaregistrovaných..</h2>
	<h2  class="animate__animated animate__swing"><?php echo $obj->howmanyzones(); ?> miestností je pripravených k diskusii..</h2>
  <p></br></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="submit" name="submit_btn" value="Sign In" class="w3-bar-item w3-button w3-padding-16 w3-right" onclick="myNotify('Send Formular');">
	<input type="password" name="password" class="w3-bar-item w3-button w3-padding-16 w3-right" style="width: 100px;" placeholder="Password..">
	<input type="text" name="nick" class="w3-bar-item w3-button w3-padding-16 w3-right" style="width: 100px;" placeholder="Nick..">
	</form>
  </div>

</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<ul class="pagination">
		<?php 
			$icount=0;

			foreach($obj->zones as $x=>$x_value)
			{
			if ($icount<=6) { 
		?>
				<li><a href="./index.php?channel=<?php echo $x; ?>" class="w3-padding-16" title="<?php echo $obj->zones_info[$x];?>"><?php echo $x_value; ?></a></li>
		<?php 
			} 
			$icount++;
			} 
		?>
<li id="myBtnCookie"><a class="w3-padding-16" style="background-color:lightblue;" title="Sign In">WRITE NEW ARTICLE</a></li>
<li onclick="openNav()"><a class="w3-padding-16" style="background-color:grey;">&#9776;</a></li>
</ul>

<!-- item container class=tweet -->
<ul class="list-group">
<?php
	$obj->switch_data_table();
    $sql = "SELECT * FROM data ORDER BY created DESC LIMIT 2048";
    $res = $obj->warp_query($sql);
	$chan = isset( $_GET['channel'] ) ? $_GET['channel'] : "life";
	$num = 0;
    while($rec = $obj->warp_fetch_array($res)) { // $rec["username"]
		$usr=$rec["username"];
		if ($obj->IfExistZoneInArray($usr)==1) if ((strstr($usr, $chan)!==false)||(strstr($chan, "life")!==false))
		{
				$dat2=gmdate("D, d M Y H:i:s", $rec["created"])." GMT";
					$bd = $obj->get_bodytext($rec["bodytext"], $rec["created"], $usr);
					$bd = strip_tags($bd); 
					$bd = preg_replace("#\[iframe\](.*?)\[/iframe\]#si", "", $bd);
					$bd = $obj->spracuj_form($bd);
				$entry_display .= <<<MESSAGE_DISPLAY
				<li class="list-group-item">{$bd}<br><br><span class="badge">{$dat2}</span><br></li>
MESSAGE_DISPLAY;
			$num++;
		}
    }
	if ($num==0) $entry_display .= "<li><b>Here is silent and so empty!</b></li>";
    $entry_display .= "</ul>";
    echo($entry_display);
?>

<div class="banner">
<a href="index.php?page=new" class="w3-bar-item w3-button w3-padding-16" style="color: bold;">CREATE NEW ACCOUNT</a>
<a href=""></a>
</div>

<link rel="stylesheet" type="text/css" href="syntax.css">
<link rel="stylesheet" type="text/css" href="zoom.css">
<script defer="defer" type="text/javascript" src="zoom-vanilla.js"></script>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    images = document.querySelectorAll("img[data-action=\"zoom\"]");
    images.forEach(function(image) {
      image.style.display = "block";
    })
  }, false);
</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtnCookie");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
