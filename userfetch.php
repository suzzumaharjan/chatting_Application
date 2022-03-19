<?php
  include "connection.php";
  include "dashboardnavbar.php";

  $sql = "SELECT * FROM tbl_users";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      $i = 0;
      while($row = mysqli_fetch_assoc($result))
       {
        $tbl_users[$i] = array(
          "u_id" => $row['u_id'],
          "fullname"=>$row['full_name'],
          "address"=>$row['address'],
          "phone"=>$row['phone'],
          "email"=>$row['email'],
          "date_of_birth"=>$row['date_of_birth'],
          "password"=>$row['password'],
        );
        $i++;
       
      }
  
    } 
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
     <link rel="stylesheet" type="text/css" href="r.css">
      <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
    
  </head>
  <body>
   
    <table >
        <tr>
            <th>S.N.</th>
            <th>Full_Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Date Of Birth</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($tbl_users as $index =>$user){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$user['fullname']?></td>
            <td><?=$user['address']?></td>
            <td><?=$user['phone']?></td>
            <td><?=$user['email']?></td>
            <td><?=$user['date_of_birth']?></td>
            <td><?=$user['password']?></td>
            <td>
                <a href="http://localhost/chatting/user_update.php?u_id=<?=$user['u_id']?>"><i class="fas fa-upload"></i></a>
            </td>
            <td>
                <a href="http://localhost/chatting/user_delete.php?u_id=<?=$user['u_id']?>"><i class="fas fa-envelope-open-text"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
  </body>
  <style type="text/css">
    
    #myform
    {
     margin-left:640px;
     margin-top: 40px;
     

    
     
    }
    #myform h1
    {
      text-align: center;
      font-weight: bold;
      font-family: sans-serif;
      margin-top: -4px;
    } 
    #myform p
    {
      font-size: 20px;
      font-weight: bold;
      font-family: sans-serif;
      margin-left:  13px;
     
    
    }
   input 
    {
      width: 260px;
      height: 40px;
      margin-top : -140px;
      margin-left:  20px;
      font-size: 16px;
      border: 1px solid black;
      border-radius: 44px;
      
      
    }
    input:hover
    {
      border-color: #ffc400ec; 
    }
    #sub
    {
      margin-top: 20px;
      margin-left: 100px;
      width: 100px;
      height: 40px;
      font-weight: bold;
      font-size: 20px;
      color: black;
      border: 1px solid black ;
      border-radius: 40px;
   
    } #sub:hover { background-color: #ffc400ec; } 
     table
    {
      margin-top: 60px;
    }
    table  a
       {
        color: black;
       }
  </style>
</html>
