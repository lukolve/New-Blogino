<?php

if ($_POST['submit_btn']=="Logout") {
		//$obj->unlink_files($_SESSION['loginuser']);
					
		$_SESSION['loginuser'] = null;
		unset($_SESSION['loadpage']); 
		unset( $_SESSION['loginuser'] );
		header( "Location: index.php" );
		exit;
}
?>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="index.css">
<?php 
	// $obj->display_AdminPanel(); 
?>
<body>


<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span> 
	<p></p>
	<?php
		$chan = isset( $_GET['channel'] ) ? $_GET['channel'] : "life";
		if ($obj->IfExistZone($chan)==0) $chan="life";
		//
		//echo $obj->Notifications();
		//
		//echo $obj->LatestAccess();
		//
		echo $obj->PostMessage($chan);
	?>
  </div>
  </div>

<!-- Sidebar 
<div class="w3-sidebar w3-bar-block" style="display:none;z-index:5; width: 230px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-xxlarge" onclick="w3_close()">&#9776;</button>
  <a href="./index.php?page=pictures" class="w3-bar-item w3-button w3-padding-16 w3-underline-color" title="Photos">Upload Photo</a>
  <a href="./index.php?page=friends" class="w3-bar-item w3-button w3-padding-16 w3-underline-color" title="Friends">Friends</a>
  <a href="./index.php?page=logout" class="w3-bar-item w3-button w3-padding-16 w3-underline-color" title="Logout">Logout</a>
</div>
-->

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
<li><a href="index.php?page=images" class="w3-padding-16" style="background-color:lightgrey;" title="View Photos">PHOTOS</a></li>
<li id="myBtnCookie"><a class="w3-padding-16" style="background-color:lightblue;" title="Sign In">WRITE NEW ARTICLE</a></li>
</ul>

<!-- Page Content -->
<div class="w3-overlay" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div>
  <div class="w3-container">
<?php
	require($_SERVER['DOCUMENT_ROOT'].'/control.php');
?>
<div class="banner">
<a href="index.php?page=logout" class="w3-bar-item w3-button w3-padding-16" style="color: black;">LOGOUT</a>
<a href=""></a>
</div>
  </div>
</div>
     
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
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
</body>
</html>

