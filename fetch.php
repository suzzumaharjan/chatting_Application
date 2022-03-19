<?php
  include "connection.php";
$key=null;
function decrypthis($data,$key)
{
    $ciphering = "AES-128-CTR"; 
        
    $options = 0; 
    $decryption_iv = '1234567891011121';
    $decryption_key = "a44afb0b6808d662";
    $key=openssl_decrypt($data,$ciphering, $decryption_key, $options, $decryption_iv);
    return $key;
}



       

  $sql = "SELECT * FROM tbl_message";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      $i = 0;
      while($row = mysqli_fetch_assoc($result)) {
        $admins[$i] = array(
          "id" => $row['id'],
          "message"=>decrypthis($row['message'],$key),
          
        );
        $i++;
      }
  }
?>

<!DOCTYPE html>
<html>
  <head>
     
  </head>
  <body>
   
    
    <table >
        <tr>
            <th>S.N.</th>
            <th>Full_Name</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($admins as $index =>$admin){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$admin['message']?></td>
            
        </tr>
        <?php } ?>
    </table>
  </body>
  <style type="text/css">
    
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
