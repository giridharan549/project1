<html>
    <body>
        <?php
			session_start();
			$name=$pass=$hash=NULL;
                        $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
			if(isset($_POST['submit']))
			{
				$name=$_POST['uname'];
				$pass=$_POST['pass'];
                                $hash = crypt($pass, '$2y$12$' . $salt);
			}
			else
			{
				echo "You haven't entered username or password";
			}
			$con=mysqli_connect("localhost","root","549Jackie!"); 
			mysqli_select_db($con,"infosecure"); 
			$query="select * from groupuser where uname='$name' and password='$hash' ";
            $result=mysqli_query($con,$query);
			$count= mysqli_num_rows($result);
			if($count==1)
			{
                                $_SESSION['Username'] = $name;
				header("Location:afterusignin.html");
			}
			else
			{
				echo "<script language='javascript' type='text/javascript'>
				alert('invalid username or password')
				</script>";
			}
                        mysqli_close($con);
?>
    </body>
</html>
			

        
