<?php
if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']) { // Only allow requests from server.
    header($_SERVER["SERVER_PROTOCOL"] . "  791 The Internet shut down due to copyright restrictions", true, 791);
    die();
}

if (empty($_GET['id'])) {
    die('Handle this.');
}

// get your $db object in here.
 $sql = "select * from logo where id=1";
$statement = $this->_db->prepare($getQuery);
$statement->execute(array(':id' => 2));

if ($row = $statement->fetch()) {
    $data = $row['pic'];
} else {
    // This shouldn't happening, you should be checking whether firstForm with the id you're calling the image for exists.
}

$exploded = explode(';', $data);
$mimetype = substr($exploded[0], 5);
$data = explode(',', $exploded[1])[1];

header('Content-type: ' . $mimetype);
echo base64_decode($data);