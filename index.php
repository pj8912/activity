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
        @media (max-width:749px) {
            body {
                display: block;
                margin: 0 auto;
                width: 100%;
            }

            .con {

                padding: 10px;
            }

          

            .btn-holder {
                justify-content: flex-end;
                display: flex;
                padding-right: 10px;

            }
        }

        @media (min-width:750px) {
            .con {

                padding: 20px;
            }

            .con .btn-holder {
                justify-content: flex-end;
                display: flex;
                padding-right: 10px;

            }
        }
    </style>

</head>

<body class="bg-light">
    <!-- header -->
    <nav style=" box-shadow: 0 0 20px rgba(0, 0, 0, 0.1), 0px 1px 1px rgba(0, 0, 0, 0.1);" class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="h2 m-auto text-dark" href="index.php" style="font-family:arial" href="#">Activity</a>
    </nav>

    <div class="con ">
        <div style="margin-top:50px">
            <h2 class="text-center ">Categories</h2>
            <?php

            $conn = mysqli_connect('localhost', 'root', '', 'activity');

            $sql = "SELECT * FROM categories";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) < 1) {
                echo '<p class="m-auto">No categories created created</p>';
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="card" style=" box-shadow: 0 0 5px rgba(0, 0, 0, 0.1), 0px 1px 1px rgba(0, 0, 0, 0.1); border-radius:30px; display:flex;margin-top:10px;flex-direction:row;padding:10px">
                    <a href="view_activity.php?cid=' . $row['c_id'] . '" class="mr-auto pl-2 m-2 h4 ">' . $row['categories'] . '</a>
                    
                    <div class="ml-auto p-2">
                     <a href="add_activity.php?cid=' . $row['c_id'] . '" class="m-1 pr-2 text-dark">
                     <svg width="1em" height="1em" viewBox="0 0 15 17" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                   </svg>
                     </a>
                     
                     <a href="delete_cat.php?cid=' . $row['c_id'] . '" class="m-1 pr-2 text-dark">
                     <svg width="1em" height="1em" viewBox="0 0 15 17" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                   </svg>
                     </a>

                    </div>

                    </div>
                    <br>';
                    // $cid = $row['c_id'];
                    // $sql = "SELECT * FROM activities WHERE c_id = '$cid'";
                    // $result =  mysqli_query($conn, $sql);
                    // while ($rows = mysqli_fetch_assoc($result)) {
                    //     echo '
                    // <ul class="list-group ">
                    // <li class="list-group-item  p-2 text-secondary">' . $rows['activity'] . '</li>
                    // ';
                    // }
                    // if (mysqli_num_rows($result) < 1) {
                    //     echo '<p class="text-center">No activity created</p><hr>';
                    // }
                }
            }

            ?>
            <!-- <div class="conns"> -->
            <!-- <div class="btn-holder"> -->

            <a href="create_cat.php" >
                <svg  width="4em"  height="3.8em" viewBox="0 0 16 16" class="mb-2 ml-auto pr-2 mr-2 fixed-bottom bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                </svg>
            </a>
            <!-- </div> -->
            <!-- </div> -->

        </div>
    </div>



</body>


</html>