<?php
include "dbconnect.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $login = false;
  $showerror = false;
  $username = $_POST["username"];
  $password = $_POST["password"];
 // $sql = "SELECT * FROM `emp` WHERE  username='$username' AND password='$password'";
  $sql = "SELECT * FROM `users` WHERE  username='$username' ";
  $result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
  $num = mysqli_num_rows($result);
  if($num == 1){
   while($row = mysqli_fetch_assoc($result)){
    if(password_verify($password, $row['password'])){
     $login = true;
     session_start();
     $_SESSION['loggedin'] = true;
     $_SESSION['username'] = $username;
     $_SESSION['logid'] = $row['sno'];
     header('location:index.php');
   }else{
    $showerror = "incorrect email or password";
  }
}
}else{
  $showerror = "incorrect email or password";
}
}else{
  $login = "";
  $showerror = "";
}
// include 'header.php';
?>

<?php 
if($login){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong>  You are logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
}
if($showerror){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error ! </strong> '.$showerror.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container my-4">
  <h1 class="text-center">Login</h1>
</div>
<center>
  <form class="container" action="login.php" method="POST">
    <div class="mb-3 col-md-6" >
      <label for="username" class="form-label">Username</label>
      <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">

    </div>
    <div class="mb-3 col-md-6">
      <label for="password" class="form-label">Password</label>
      <input type="password" maxlength="23" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-success col-md-4">Login</button>
  </form>
  <br>
</center>
</body>
</html>
// <?php #include 'footer.php';?>