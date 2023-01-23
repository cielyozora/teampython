<?php
$f = "visit.php";
if(!file_exists($f)){
  touch($f);
  $handle =  fopen($f, "w" ) ;
  fwrite($handle,0) ;
  fclose ($handle);
}
 
include('libs/phpqrcode/qrlib.php'); 

if(isset($_POST['submit']) ) {
  $tempDir = 'temp/'; 
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gsection = $_POST['gsection'];
  $pcontact = $_POST['pcontact'];
  $pemail = $_POST['pemail'];

  /*$filename = getUsernameFromEmail($pemail);*/
  $filenamex = ''.$lname.'_'.$fname.'_'.$gsection.'';
  $codeContents = ''.$fname.','.$lname.','.$gsection.','.$pcontact.','.$pemail.','; 
  QRcode::png($codeContents, $tempDir.''.$filenamex.'.png', QR_ECLEVEL_L, 5);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="libs/style.css">
  <link rel="stylesheet" href="libs/video.css">
  <link rel="stylesheet" href="inversionz/Inversionz.otf" type="text/css">
	<title>SJLSHS SECURITY MANAGEMENT</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
  <script src="libs/navbarclock.js"></script>
  <script type="text/javascript">
    <!--
    if (screen.width <= 699) {
    document.location = "mobile.php";
  }
</script>    
</head>
<video autoplay muted loop id="myVideo">
  <source src="bgvideo/video.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

  <body onload="startTime()">
    <nav class="navbar-inverse" role="navigation">
      <div id="clockdate">
        <div class="clockdate-wrapper">
          <div id="clock"></div>
          <div id="date"><?php echo date('l, F j, Y'); ?></div>
        </div>
      </div>
      </div>
    </nav>
      <a href=#>
        <img src="img/12mlogo1.png" class="hederimg">
      </a>


<form id="form" form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
  <br>
  <br>
  <h1>student's identification qr code generator</h1>
  <div id="data"></div>
  <div class="form-group">
    <label for="name">Name<span>Enter your Name</span></label>
    <input type="text" name="fname" id="fname" class="form-controll"/ placeholder="Enter your Name" value="<?php  @$fname; ?>" required />
  </div>
  <div class="form-group">
    <label for="lname">Lastname<span>Enter your Lastname</span></label>
    <input type="text" name="lname" id="lname" class="form-controll" placeholder="Enter your Lastname" value="<?php @$lname; ?>" required />
  </div>
  <div class="form-group">
    <label for="gsection">Grade and Section<span>Sample Format: 12 Microsoft</span></label>
    <input type="text" name="gsection" id="gsection" class="form-controll" placeholder="Grade And Section" value="<?php  @$gsection; ?>" required />
  </div>
  <div class="form-group">
    <label for="contact">Contact Number<span>Parent's Contact Number</span></label>
    <input type="Number" name="pcontact" id="pcontact" class="form-controll" placeholder="Parent's Contact Number" value="<?php @$pcontactx; ?>" required />
  </div>  
  <div class="form-group">
    <label for="pemail">Email Address<span>Parent's Email Address</span></label>
    <input type="email" name="pemail" id="pemail" class="form-controll" style="text-transform: none;" placeholder="Parent's Email" value="<?php @$pemail; ?>" required />
  </div> 
    
  <div class="form-group">
    <button type="submit" name="submit" id="submit">Generate QR Code</button>

    <a class="btn btn-primary submitBtn" name="submit" id="submitx" href="download.php?file=<?php echo $filenamex; ?>.png ">Download QR Code</a>
  </div>
  
</form>
<?php
if(!isset($filename)){
  $filename = "author";
}
?>
<link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet' type='text/css'>

<a href="https://facebook.com/dewieph" class="back-to-article" target="_blank">Facebook</a>
</body>
<script>
function generated() {
  alert("I am an alert box!");
}
</script>
</html>