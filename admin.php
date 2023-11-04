<?php session_start(); /* Starts the session */
include "db/connect.php";


if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
?>

Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Display</title>
    <style>
     
    
    </style>
</head>
<body>

  <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
    <div class="container">
    <table class="table">
      <center><h3 class="display-3"> Events </h3></center>
    <thead>
    <tr>
      <th scope="col">event_id</th>
      <th scope="col">event_title</th>
      <th scope="col">event_price</th>
      <th scope="col">participants</th>
      <th scope="col">img_link</th>
      <th scope="col">type_id</th>
      


    </tr>
  </thead>
  <tbody>
    <?php
    $type_query1 = "SELECT * FROM events";
    $run_query1 = mysqli_query($con,$type_query1);
    if($run_query1){
        while($row = mysqli_fetch_array($run_query1)) 
        {
            $event_id = $row['event_id'];
            $event_title = $row['event_title'];
            $e_p = $row['event_price'];
            $p = $row['participents'];
            $i_l = $row['img_link'];
            $t_id = $row['type_id'];
            echo '<tr>
            <th scope="row">' . $event_id . '</th>
            <td>' . $event_title . '</td>
            <td>' . $e_p . '</td>
            <td>' . $p . '</td>
            <td>' . $i_l . '</td>
            <td>' . $t_id . '</td>
            



          </tr>';


        }
        
    }

    ?>
    
  </tbody>

    </table>
    

    <table class="table">
      <center><h3 class="display-3"> Event Type </h3></center>
    <thead>
    <tr>
    
      <th scope="col">type_id</th>
      <th scope="col">type_title</th>
      


    </tr>
  </thead>
  <tbody>
    <?php
    $type_query2 = "SELECT * FROM event_type";
    $run_query2 = mysqli_query($con,$type_query2);
    if($run_query2){
        while($row = mysqli_fetch_array($run_query2)) 
        {
            $type_id = $row['type_id'];
            $type_title = $row['type_title'];
            
            
            echo '<tr>
            <th scope="row">' . $type_id . '</th>
            <td>' . $type_title . '</td>
            
            



          </tr>';


        }
        
    }

    ?>
    
  </tbody>

    </table>
    


    <table class="table">
    <center><h3 class="display-3"> Participants </h3></center>

  <thead>
    <tr>
      <th scope="col">p_id</th>
      <th scope="col">event_id</th>
      <th scope="col">fullname</th>
      <th scope="col">email</th>
      <th scope="col">mobile</th>
      <th scope="col">college</th>
      <th scope="col">branch</th>
      <th scope="col">Operation</th>


    </tr>
  </thead>
  <tbody>
    <?php
    $type_query = "SELECT * FROM participants";
    $run_query = mysqli_query($con,$type_query);
    if($run_query){
        while($row = mysqli_fetch_array($run_query)) 
        {
            $p_id = $row['p_id'];
            $e_id = $row['event_id'];
            $name = $row['fullname'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $college = $row['college'];
            $branch = $row['branch'];
            echo '<tr>
            <th scope="row">' . $p_id . '</th>
            <td>' . $e_id . '</td>
            <td>' . $name . '</td>
            <td>' . $email . '</td>
            <td>' . $mobile . '</td>
            <td>' . $college . '</td>
            <td>' . $branch . '</td>
            <td> <button class="btn btn-danger"> <a href="delete.php?
            deleteid='.$p_id.'"class="text-light">
            Delete </a> </button>

            </td>
            <td> <button class="btn btn-primary"> <a href="update.php?
            updateid='.$p_id.'"class="text-light">
            Update </a> </button>
             
            </td>



          </tr>';


        }
        
    }

    ?>
    
  </tbody>
</table>
        </div>

    
</body>
</html>