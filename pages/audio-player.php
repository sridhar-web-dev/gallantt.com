<?php
$file = $_GET['file'];
$audioUrl = '../uploads/investors-reports/uploads/' . $file;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Audio Player</title>
</head>
<body style="padding:40px; font-family:Arial;">

  <audio 
    controls 
    controlsList="nodownload"
    oncontextmenu="return false;"
    style="width:100%;"
  >
    <source src="<?= $audioUrl ?>" type="audio/mpeg">
  </audio>

</body>
</html>