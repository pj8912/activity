<div style="width:98%;height:98%;padding:2px;margin:1px;display:block">
<?php


if(isset($_REQUEST['aid'])){
    $conn = mysqli_connect('localhost', 'root', '', 'activity');
    
    $aid = $_REQUEST['aid'];
    $sql = "select * from activities where a_id = '$aid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        echo $row['activity'];
    }
}

?>
</div>
