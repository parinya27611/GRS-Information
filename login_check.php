<?php 
session_start();

        if(isset($_POST['email'])){

         
          include_once("connect.php");

        //รับค่า user & password
                  $Username = $_POST['email'];
                  $Password = $_POST['pass'];
        //query 
                  $sql="SELECT * FROM tb_login Where log_email='".$Username."' and log_type='"."admin"."' ";
 
                  $result = mysqli_query($con,$sql);
        
                  if(mysqli_num_rows($result)> 0)
                  {
                    while($row = mysqli_fetch_array($result))  
                    {  
                      if(password_verify($Password, $row["log_password"]))  
                     {  
                          //return true;  
                          $_SESSION["log_type"]="admin" ;
                        
                          header('Location: tb_login.php');
                     }  
                     else  
                     {  
                          //return false;  
                          echo "<script>";
                          echo "alert(\" กรุณากรอก password ให้ถูกต้อง\");"; 
                          echo "window.history.back()";
                          echo "</script>"; 
                     }  
                    }
                  }  
                  else  
                  {  
                      echo "<script>";
                      echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
                      echo "window.history.back()";
                      echo "</script>"; 
                  }   
                } 


 
 
?>