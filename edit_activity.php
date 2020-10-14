<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
        @media (min-width:750px) {

            .boxx {
                width: 600px;
                /* text-align: justify; */
            }
        }
    </style>
</head>

<body>
    <?php
    if (isset($_REQUEST['aid'])) {
        $aid = $_REQUEST['aid'];
        $sql = "SELECT * FROM activities where a_id = '$aid' ";
        $conn = mysqli_connect('localhost', 'root', '', 'activity');
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $cid = $row['c_id'];
        echo '
        <form action="edit_activity.php" style="height:500px" method="post" class=" text-center m-auto">
        
        <h3 class="mt-5 text-center">Edit activity</h3>
        <div class="form-group">

        <textarea id="editor" class="p-2 form-control"  name="activity"  cols="30" rows="40">
            ' . $row['activity'] . '
        </textarea>
        </div>

            
            <div class="form-group" id="cbtn">
                <button name="cbtn" class="btn btn-sm btn-primary">UPDATE</button>
                <input type="hidden" value="' . $aid . '" name="aid">
               
            </div>
        </form>
            ';
    }
    ?>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor',{height:400});
    </script>
    <?php
    if (isset($_POST['cbtn'])) {
        if (isset($_POST['aid']))
            $ac = $_POST['activity'];
            $aid = $_POST['aid'];

            $sql = "UPDATE activities set activity = '$ac' where a_id = '$aid' ";
            mysqli_query($conn, $sql);
            header('location:view_activity.php?cid='.$cid);
            exit();
    }
    ?>
</body>

</html>
                  
