<?php

if (isset($_REQUEST['cid'])) {
    // $conn = mysqli_connect('localhost', 'root', '', 'activity');


    $cid = $_REQUEST['cid'];

    // oop --transaction
    // for fun
    // delete all activities related to categories
    // then delete the category...

    try {
        $db = new PDO("mysql:host=localhost;dbname=activity", "root", "");
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    try {

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->beginTransaction();



        $db->exec("DELETE FROM activities WHERE c_id = '$cid' ");
        $db->exec("DELETE FROM categories WHERE c_id = '$cid' ");

        $db->commit();
        header('location:index.php');
        exit();
    } catch (Exception $e) {

        echo $e->getMessage();
    }
}
