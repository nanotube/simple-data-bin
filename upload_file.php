<?php

if ($_FILES["file"]["size"] < 20971520) { // your max desired size in bytes
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  }
  else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    $randprefix = hash('ripemd160', openssl_random_pseudo_bytes(32), false);
    $filepath = "upload/" . $randprefix . $_FILES["file"]["name"];
    if (file_exists($filepath)) {
      echo $filepath . " already exists. "; // should never happen
    }
    else {
      move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
      echo "Link to file: " . '<a href = "' . $filepath . '">' . $filepath . '</a>' ;
    }
  }
}
else {
  echo "File too large.";
}
?>
