<?php
session_start();
include_once('connect.php');
include_once('functions.php');

$error_name = '';
$error_password = '';

if(isset($_GET['msg']))
{
  reg_success();
}

if(isset($_POST['submit']))
{
    if(empty($_POST['name']))
    {
        $error_name = "Enter Name";
        blank();
    }
    else{
        $name=$_POST['name'];
        if(empty($_POST['password']))
        {
          $error_password = "Enter Password";
          blank();
        }
        else{
            $password=$_POST['password'];
        }
        
    }
    if($error_name == '' && $error_password == '' )
    {
        $sql = "select * from verfied_user where name='$name' ";
        $result=mysqli_query($conn,$sql);
        $num =mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if ($num == 1){
            if ($row['status'] == 'verified') {
                if (password_verify($password, $row["password"])) {
                    header('location:home.php');
                    $_SESSION['user_code'] = $row['user_id']; 
                    $_SESSION['user_name'] = $row['name'];
                    }
                else{
                    pass_error();
                }
            }else{
                not_verified();
            }
        }
        else{
           login_error();
        }
    }
}

?>


<html>
<head>
<title>login</title>
<link rel="stylesheet" href="design.css">
</head>
<body>
 <div class="login-page">
 <img src="download (1).png" class="avatar">
 <div class="form">
     <form action="#" method="post">
	 <h2>Login Here</h2>
	 <input type="text" name="name" placeholder="User Name">
	 <input type="password" name="password" placeholder="Password">
	 <button type="submit" name="submit">Login </button>
	 <p class="message">Not Registered?<a href=reg.php> Register</a>
	 </p>
	 </form>
 </div>
 </div>
</body>
</html>