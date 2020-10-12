<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <style>
        @media (max-width:749px) {
            body {
                display: block;
                margin: 0 auto;
                width: 100%;
            }

            #cbdy {
                /* width: 500px; */
                margin: 0 auto;
                margin-top: 50px;
            }

            #cbtn {
                margin: 0 auto;
                text-align: center;
            }
        }

        @media (min-width:749px) {
            #cbdy {
                width: 500px;
                margin: auto;
                margin-top: 50px;

            }

            #cbtn {
                margin: 0 auto;
                text-align: center;
            }

            body {
                display: block;
                margin: 0 auto;
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-light">
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="h2 m-auto text-dark" href="index.php" style="font-family:arial" href="#">Activity</a>
    </nav>
    <div class="container">
        <?php
        if (isset($_REQUEST['cid'])) {
            $cid = $_REQUEST['cid'];

            echo '
        <div class="card card-body" id="cbdy">

            <form action="add_activity.php" method="post">
            <h3 class="text-center">Create Activity</h3>
            <div class="form-group">
            <textarea class="form-control" name="activity" placeholder="Activity.." cols="30" rows="10"></textarea>

                </div>
                <div class="form-group" id="cbtn">
                    <button name="cbtn" class="btn btn-sm btn-primary">CREATE</button>
                    <input type="hidden" name="cid" value="' . $cid . '">
                </div>
            </form>
        </div>';
        }
        ?>

        <?php

        if (isset($_POST['cid'])) {
            $conn = mysqli_connect('localhost', 'root', '', 'activity');

            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $cid = $_POST['cid'];
            $activity = $_POST['activity'];

            $sql = "INSERT INTO activities(activity,c_id) VALUES('$activity','$cid')";
            if (mysqli_query($conn, $sql)) {

                header('location:index.php');
                exit();
            }
        }
        ?>
</body>

</html>