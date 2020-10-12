<?php

if (isset($_REQUEST['aid']) && isset($_REQUEST['cid'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'activity');

    // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $aid = $_REQUEST['aid'];
    $cid = $_REQUEST['cid'];


    $sql = "DELETE FROM activities where a_id = '$aid'";
    mysqli_query($conn, $sql);
    header('location:view_activity.php?cid=' . $cid);
    exit();
}
