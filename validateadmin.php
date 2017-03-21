<html>
    <body>
        <?php	
                        session_start();
                        $name=$pass=$hash=$count=NULL;
                        $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
			if(isset($_POST['submit']))
			{
				$name=$_POST['uname'];
                                //echo "$name";
				$pass=$_POST['pass'];
                                //echo "$pass";
                                $hash = crypt($pass, '$2y$12$' . $salt);
                                //echo "$hash";
			}
			else
			{
				
                            echo "no connection established";
			}
			$con=mysqli_connect("localhost","root","549Jackie!");
                        if(!$con){
                        echo "failed to connect";}
			mysqli_select_db($con,"infosecure"); 
			$query="SELECT * FROM groupadmin WHERE uname='$name' AND password='$pass'";
                        $result=mysqli_query($con,$query);
                        if(!$result){
                        echo "failed";}
                        //echo "$result";
			$count= mysqli_num_rows($result);
                        //echo "$count";
			if($count==1)
			{
                            
                                $_SESSION['Username'] = $name;
				header("Location: afterasignin.html");
			}
			else
			{
				echo "<script language='javascript' type='text/javascript'>
				alert('invalid username or password');
				</script>";
                                
			}
                        
                        mysqli_close($con);
?>
    </body>
</html>
			

        
