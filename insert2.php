<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="infosecure.css" />
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
        $name=$pass=$dob=$email=$hash=NULL;
       if(isset($_POST['submit'])) {
            $name=$_POST['uname'];
            $pass=$_POST['pass'];
            $hash = crypt($pass, '$2y$12$' . $salt);
            $dob=$_POST['dob'];
        $email=$_POST['email'];}
        $con=mysqli_connect("localhost","root","549Jackie!");

mysqli_select_db($con,"infosecure");
$query="INSERT INTO groupuser (uname,password,dob,email) VALUES ('$name','$hash','$dob','$email')";
if(mysqli_query($con,$query))
{
       echo "error";
}
echo "<script  type='text/javascript'>
    alert('user account created successsfully')
    </script>";
mysqli_close($con);
?>
        <h1>INFOSECURE</h1>
        <h2 align="center"> File sharing made easier </h2>
        <div>
            <p>
                <a href="home.html">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="group.html">Group</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="groupuser.html">Group User</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="groupadmin.html">Group Admin</a> > <a href="groupadminsignup.html">Sign In</a>
            
                <h3 align="center">Enter Username and Password</h3>
                
        
                <form action="" >
                    <p align="left">
                        Username: <input type="text" name="uname" size="20"/><br/>
                        Password: <input type="password" name="pass" size="10"/><br/>
                        <button type="submit"  name="submit" class="btn-lg btn-primary"><i class="fa fa-chevron-circle-right" aria-hidden="true">&nbsp;Submit</i></button>
                    </p>
                </form>
            </p>    
        </div>
    </body>
</html>
