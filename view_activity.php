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
                width: 700px;
            }
        }
    </style>
</head>

<body class="bg-light">
    <!-- header -->
    <nav style=" box-shadow: 0 0 20px rgba(0, 0, 0, 0.1), 0px 1px 1px rgba(0, 0, 0, 0.1);" class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="h2 m-auto text-dark" href="index.php" style="font-family:arial" href="#">Activity</a>
    </nav>
    <div style="margin:0 auto; margin-top:50px; padding:20px;" class="boxx">

        <?php

        if (isset($_REQUEST['cid'])) {
            $conn = mysqli_connect('localhost', 'root', '', 'activity');
            $cid = $_REQUEST['cid'];
            $sql = "SELECT * FROM categories WHERE c_id = '$cid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '
            <div style="display:flex;flex-">
            <h2 class=" text-secondary ">' . $row['categories'] . '</h2>
            <div class="ml-auto">
            <a href="add_activity.php?cid=' . $row['c_id'] . '" class="m-1 pr-2 text-dark btn btn-dark-outline">
            <svg width="1em" height="1em" viewBox="0 0 15 17" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
          </svg>
          Add Activity
            </a>
            
            <a href="delete_cat.php?cid=' . $row['c_id'] . '" class="m-1 pr-2 text-dark btn btn-dark-outline">
            <svg width="1em" height="1em" viewBox="0 0 15 17" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
          </svg>
          delete category
            </a>

           </div>
           </div>
   
            <hr>';
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM activities WHERE c_id = '$cid'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) < 1) {
                echo '<div class="text-center h6">No activity created created<br><br>
            <a href="add_activity.php?cid=' . $row['c_id'] . '" class="btn btn-secondary">
            <svg width="1em" height="1em" viewBox="0 0 17 15" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg>
            Add Activity
            </a>
            </div>
            ';
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
            <div class="card" style="padding:1px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1), 0px 1px 1px rgba(0, 0, 0, 0.1);" >
                <div class="m-auto p-0 ">
                    <a href="edit_activity.php?aid=' . $row['a_id'] . '" class="m-1 pr-2 text-dark">
                        <svg width="1em" height="1em" viewBox="0 0 15 17" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      
                        </svg>
                    </a>
                    <a href="delete_activity.php?aid=' . $row['a_id'] . '&cid=' . $row['c_id'] . '" class="m-1 pr-2 text-dark">
                      <svg width="1em" height="1em" viewBox="0 0 15 17" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                      </svg>
                    </a>
                </div>
                <hr>
                <p  class="m-3 text-dark">' . $row['activity'] . '</p>

           
                     
            </div><br>


            ';
            }
        }
        ?>
    </div>

</body>

</html>
