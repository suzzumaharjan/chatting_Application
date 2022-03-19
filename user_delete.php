<?php
    include "connection.php";
   
    if($_GET){
        $u_id = $_GET['u_id'];
        $sql = "DELETE  FROM tbl_users  WHERE u_id = $u_id";
        // echo $sql;
        if(mysqli_query($conn, $sql)){
            header('Location:http://localhost/chatting/userfetch.php');
            exit();
        }
        else
        {
            echo "Error deleting record: " . $conn->error;
        }
        
    }
    mysqli_close($conn);
?>