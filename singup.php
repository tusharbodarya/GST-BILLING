<?php include 'header.php'; ?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $showalert = false;
  $showerror = false;
  $name = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $gstno = $_POST["gstno"];
  $bamkname = $_POST["bamkname"];
  $acno = $_POST["acno"];
  $ifsc = $_POST["ifsc"];
  $cpassword = $_POST["cpassword"];
  $existsql = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
  $existnumrows = mysqli_num_rows($result);
  if($existnumrows > 0){
    // $exist = true;
    $showerror = "User already Exist.";
  }else{
  // $exist = false;
    if(($password == $cpassword)){
      $has = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` ( `name`,`username`,`gstno`,`bamkname`,`acno`,`ifsc`, `password`) VALUES ('".$name."','".$username."','".$gstno."','".$bamkname."','".$acno."','".$ifsc."', '".$has."')";
      $result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
      if($result){
        $showalert = true;
      }
    }else{
      $showerror = "Please Enter Correct Details";
    }
  }
}else{
  $showerror = "";
  $showalert = "";
}
?>
<?php 
if($showalert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong>  Your Account is Created now and you can Login.
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
<div class="container my-16">
  <h1 class="text-center">Signup</h1>
</div>
<center>
  <form class="container" method="POST">
    <div class="mb-3 col-md-6" >
      <label for="name" class="form-label">Name</label>
      <input type="text" maxlength="30" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3 col-md-6" >
      <label for="username" class="form-label">Username</label>
      <input type="text" maxlength="25" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 col-md-6" >
      <label for="gstno" class="form-label">GSTIN No.</label>
      <input type="text"  class="form-control" id="gstno" name="gstno" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 col-md-6" >
      <label for="bamkname" class="form-label">Bank Name</label>
      <input type="text"  class="form-control" id="bamkname" name="bamkname" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 col-md-6" >
      <label for="acno" class="form-label">Bank A/C No.</label>
      <input type="text"  class="form-control" id="acno" name="acno" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 col-md-6" >
      <label for="ifsc" class="form-label">RTGS/IFSC Code :</label>
      <input type="text"  class="form-control" id="ifsc" name="ifsc" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 col-md-6">
      <label for="password" class="form-label">Password</label>
      <input type="password" maxlength="23" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3 col-md-6">
      <label for="cpassword" class="form-label">Confirm Password</label>
      <input type="password" maxlength="23" class="form-control" id="cpassword" name="cpassword" required>
      <!-- <div id="emailHelp" class="form-text">Make Sure to type same password.</div> -->
    </div>
    <button type="submit" class="btn btn-success col-md-4">Signup</button>
  </form>
  <br>
</center>

<?php include 'footer.php';?>