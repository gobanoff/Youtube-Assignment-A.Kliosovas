<?php
require_once('db.php');
$user = $_POST['username'];
$title = $_POST['videotitle'];
$vid = $_POST['video_id'];
$cat = $_POST['category'];
$link = $_POST['link'];
$desc = $_POST['description'];

if (
    empty($link) or empty($cat) or empty($title)
    or empty($user) or empty($vid)or empty($desc)
) {
    echo "<h1>Fill in all the fields </h1>";
} else {

    $sql1 = "INSERT INTO `videobank` (videotitle,category,username,video_id,link,description) 
    VALUES ('$title', '$cat', '$user','$vid', '$link','$desc')";

    if ($conn->query($sql1)) {
        echo "<h2>Input complete !</h2>";
    }
}

?>
<a href="?page=admin" class="btn btn-info">BACK</a>
<style>
    h1 {
        color: red;
    }

    h2 {
        color: rgb(0, 255, 4);
    }

    .btn {
        color: white;
    }
</style>