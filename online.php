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
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
.bgimg {
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url('/w3images/profile_girl.jpg');
  min-height: 100%;
}

.tweet {
	CLEAR: left; FONT-SIZE: 12px;  PADDING: 0.0em; MARGIN: 0.0em;
	WIDTH: inherit;
	font-family: verdana, tahoma, arial, helvetica, sans-serif;
	font:200 16px/16px sans-serif;
	
	border-left: 1px dotted #dddddd;
	border-right: 1px dotted #dddddd;
}
.tweet LI {
	PADDING-BOTTOM: 20px; PADDING-TOP: 20px;  
	PADDING-LEFT: 5px; PADDING-RIGHT: 5px;
	
	DISPLAY: block;
	
	TEXT-ALIGN: left; TEXT-DECORATION: none;
	/*LIST-STYLE-TYPE: none;*/
	
	border-bottom: 1px dotted #dddddd;
	
	COLOR: black; 

}
/*
.tweet LI A {
	
	DISPLAY: block; */
	/* FONT-SIZE: 11px;*/  
/*	COLOR: black; 
	TEXT-ALIGN: left; TEXT-DECORATION: none;
}
*/
.tweet LI:hover {
	TEXT-ALIGN: left; TEXT-DECORATION: none;
	
	DISPLAY: block;
	
	color: black;
	box-shadow: 0px 0px 0px 3px rgb(204, 204, 204);
		  background-color: rgb(0,0,0); /* Fallback color */
  
    background-color: rgba(255,100,1,.1); /* Black w/ opacity */
	background-size: 100% 100%;
	
	/* background-color: #eef; */
	/* border-bottom: 1px dotted black; */
	/* FONT-SIZE: 11px;*/
	/*PADDING-LEFT: 7px; */
}


.tweet-avatar {
    position: relative;
    top: 20px;
    left: 20px;
    border-radius: 50% 50% 50% 50%;
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
    box-shadow: 0px 0px 0px 3px rgb(204, 204, 204);
}
.tweet-reply-link {
    position: relative;
    top: 60px;
    left: 10px;
    font-size: 13px;
    width: 50px;
    text-align: center;
    color: rgb(204, 204, 204);
}
.tweet-author {
	position: relative;
    font-weight: bold;
    font-size: 16px;
    right: 100px;
}
.tweet-date-link {
    position: relative;
    top: 5px;
    right: 10px;
    font-size: 11px;
    line-height: 13px;
    text-align: right;
}
.tweet-text {
	position: relative;
    font-weight: normal;
    font-size: 16px;
    top: 20px;
    left: 100px;
}

.message-field {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid grey;
  background-color: transparent;
  color: grey;
  font-size: 28px;
}

.message-field:hover {
  border-bottom: 2px solid red;
  color: red;
}

.fbutton, .message-submit {
  border: 2px solid red;
  background-color: transparent;
  color: red;
  height: 40px;
}


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

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

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block" style="display:none;z-index:5; width: 230px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-xxlarge" onclick="w3_close()">&#9776;</button>
  <a href="./index.php?page=pictures" class="w3-bar-item w3-button w3-padding-16 w3-underline-color" title="Photos">Upload Photo</a>
  <a href="./index.php?page=friends" class="w3-bar-item w3-button w3-padding-16 w3-underline-color" title="Friends">Friends</a>
  <a href="./index.php?page=logout" class="w3-bar-item w3-button w3-padding-16 w3-underline-color" title="Logout">Logout</a>
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
</ul>

<!-- Page Content -->
<div class="w3-overlay" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div>
  <button class="w3-button w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
<?php
	require($_SERVER['DOCUMENT_ROOT'].'/control.php');
?>
  <p>
  <?php
echo "<p>Copyright &copy; 2013-" . date("Y") . " Lukas Veselovsky</p>";
?></p>
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

