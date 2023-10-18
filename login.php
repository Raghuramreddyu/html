<?php
  
   session_start();
   include("db.php");
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
 
    $mail = $_POST['mail'];
    $password = $_POST['pass'];

    if(!empty($mail) && !empty($password) && !is_numeric($mail))
    {
       
//starst

$stmt = $conn->prepare("select * from signupform where email = ? ");
$stmt->bind_param("s", $mail);
		$stmt->execute();
        $result = $stmt -> get_result();

        if($result ->num_rows>0) {
            echo"Email alaready existys in system ";
        }
		
		//   ends here
else {


        $query ="select * form signupform where email= '$mail' limit 1";
       $result = mysqli_query($conn, $query);
    

        mysqli_query($conn, $query);

        echo"<script type='text/javascript'> alter('Successfully Register')</script>";
    }
}
        else{
 echo"<script type='text/javascript'> alter('Please Enter some Valid Information')</script>";
}
echo"Email alaready existys in system 1 ";
{
    header("location: index.php");
    die;
}
 
                
          }
            



   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            visula login
        </title>
        <link rel ="stylesheet" href="stylee.css">

    </head>
        <body>
          <div class="center">
            <h1>login</h1>
            <form method="post">
            <div class="txt_field"> 
                    <input name="mail" type="email" required>
                    <span></span>
                    <label>email</label>
                    </div>
            <div class="txt_field"> 
                <input name="pass" type="password" required>
                <span></span>
                <label>password</label>
            </div>
          <div class="pass">Forgot password</div>
           <td>
            <a href="index.php">
            <input type="submit" value="login"></a></td>
           <a href="signup.php"><div class="form-box Signup">
            <h4>Not a member? Signup</h4>
           </div></a>
             </form>
           </div>
        </body>
</html>