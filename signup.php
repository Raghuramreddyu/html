<?php
   
   session_start();
   include("db.php");
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
    
    $userName= $_POST['username'];
    $mail = $_POST['mail'];
    $password = $_POST['pass'];
    $target="http://localhost:3000/passwordtoken.php";
    

   
    
    
    if(!empty($mail) && !empty($password) && !is_numeric($mail))
    {


//starst

$stmt = $conn->prepare("select * from signupform where email = ? ");
$stmt->bind_param("s", $mail);
		$stmt->execute();
        $result = $stmt -> get_result();

        if($result -> num_rows>0) {
            echo"Email alaready existys in system ";
        }
        
		
		//   ends here
else {

        $query = "insert into signupform (username,email, password,token) values('$userName','$mail','$password','$target')"; 

        mysqli_query($conn, $query);

        echo"<script type='text/javascript'> alter('Successfully Register')</script>";
    }
}
        else{
 echo"<script type='text/javascript'> alter('Please Enter some Valid Information')</script>";
}
{
    header("location: index.php");
    die;
}
}
    
    /*echo "Validation is successfull!";
     $query = "insert into signupform (username,email, password) values('$userName','$mail','$password')";

   
     mysqli_query($con, $query);
    echo"<script type='text/javascript'> alter('Successfully Register')</script>";*/

 


?>





<!DOCTYPE html>
<html>
    <head>
        <title> visula audio login</title>
        <style>
            body{
    margin: 0;
    padding: 0;
    font-family: montserrat;
    background: linear-gradient(120deg,#2980b9, #8e44ad);
    height: 100vh;
    overflow: hidden;
}
.center{
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
width: 400px;
background: white;
border-radius:10px;
}
.center h1{
    text-align: center;
    padding: 0 0 20px 0;
    border-bottom: 1px solid silver;
}
.center form{
    padding: 0 40px;
    box-sizing: border-box;
}
form .txt_field{
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 30px 0;
}
.txt_field input{
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: none;
    outline: none;
}
.txt_field label{
position: absolute;
top: 50%;
left: 5px;
color:#adadad;
transform: translateY(-50%);
font-size: 16px;
pointer-events: none;
transition: .5s;
}
.txt_field span::before{
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 0%;
    height: 2px;
    background: #2691d9;
    transition: .5s;
}
.form-box login{
    margin: 3px 0;
    text-align: center;
    font-size: 5px;
    color: #666666;
}
.form-box signup a{
color: #2691d9;
text-decoration: none;
}
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
    top: -5px;
    color: #2691d9;
}
.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before{
width: 100%;
}
.pass{
    margin: -5px 0 20px 5px;
    color: #a6a6a6;
    cursor: pointer;
}
.pass:hover{
    text-decoration: underline;
}
input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer ;
    outline: none;
    
}
input[type="submit"]:hover{
    border-color: #2691d9;
    transition: .5s;

}
        </style>
    
    
    </head>
    <body>
        <div class="center">
            <h1>signup</h1>
            <form method="post">
              <div class="txt_field"> 
            <input name="username" type="text" required>
            <span></span>
            <label>Username</label>
            </div>
          
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
          
           <input type="submit" value="signup">
           <a href="login.php"><div class="form-box login">
            <h4>login</h4></a>
           </div>
          </form>
          <p></p>
        </div>
 </body>
  </html>
