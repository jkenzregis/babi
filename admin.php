<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

  //   $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
  //   foreach($system as $k => $v){
  //     $_SESSION['system'][$k] = $v;
  //   }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<?php include 'header.php' ?>
<body class="hold-transition login-page bg-lightblue" style="background:url(assets/logo2.png); background-repeat:no-repeat; background-size: 100% 100%; background-position:center" >
<!-- <style>
	b{
  background:black;
	}
</style>   -->
<!-- <h2><b style="background:black;"><?php echo $_SESSION['system']['name'] ?></b></h2> -->
<h2><b style="background:black;" class="text-white">ONLINE TEACHER EVALUATION SYSTEM</b></h2>
<div class="login-box">
  <div class="login-logo">
    <a href="#" class="text-white"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="" id="login-form">
        <div class="input-group mb-3">
          <input type="school_id" class="form-control" name="school_id" placeholder="Your School Id">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="">Login As</label>
          <select name="login" id="" class="custom-select custom-select-sm">
            <!-- <option value="3">Student</option>
            <option value="2">Faculty Teacher</option> -->
            <option value="1">Admin</option>
          </select>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
           <!-- <div class="col-6">
            <button type="#" class="btn btn-primary btn-block" onclick="window.location.href='signup/student1.php'">Stundent Sign-up</button>
          </div> -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
				</div>
          <!-- /.col -->
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include 'footer.php' ?>
<!-- <?php
// echo "<center></br>";
// echo '<input type="button" style="width:120px;height:60px" value="SourceCode" onclick="window.location=\'http://youtube.com/techgeekshan\'" />';
// echo '<br><br>';
// echo '<input type="button" style="width:150px;height:30px" value="Download" onclick="window.location=\'\'" />';
// echo '<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=registration.php"><i "></i>Student Signup</a>';
// echo '<br></center>';
// echo '<li><a style="color:#FFFFFF" href="index.php?info=new_student.php"><i class="fa fa-sign-out fa-fw"></i>Registration</a></li>';
?>
<form>
<input class="MyButton" type="button" value="Your Text Here" onclick="window.location.href='new_student1.php'"/>
</form> -->



</body>
</html>