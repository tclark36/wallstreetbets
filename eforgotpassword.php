<?php
    $email = "";
    $epassword = "";
    $error = false;

    if(isset($_POST["submit"])){
        if(isset($_POST["email"])) $email=$_POST["email"];
        if(isset($_POST["password"])) $epassword=$_POST["password"];

        if(!empty($email) && !empty($epassword)){
            include 'dbconnect.php';

            //check to see if email exists in database
            $sql = "select * from cpsc.employee where Email='$email'";
            $result = $conn->query($sql);
            $row=mysqli_fetch_array($result);
            if($row) {
                //update password for account
                $sql = "update cpsc.employee set Password='$epassword' where Email='$email'";
                $result = $conn->query($sql);
                if($result) {
                    //javascript to display a confirmation message
                    echo '<script type="text/javascript">';
                    echo 'alert("Your password has been changed!")';
                    echo '</script>';
                }
            } else {
                $error = true;
            }
        }
    }
?>
<!DOCTYPE html>
<html lan="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <!--Google Icon Font Style-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Materialize.css style-->
  <link type="text/css" rel="stylesheet" href="Style/materialize/css/materialize.min.css"  media="screen,projection"/>
  <!--Materialize javascript style-->
  <script type="text/javascript" src="Style/materialize/js/materialize.min.js"></script>
  <!--personal style page-->
  <link href="Style/MainStyle.css" rel="stylesheet">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-192315482-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-192315482-1');
  </script>

  <style type="text/css">
    img{
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    #loginform {
      text-align: center;
    }
    #eloginbtn {
        text-align: right;
    }
    #newusertxt {
      text-align: center;
      font-size: 12pt;
    }
    #newuserlink {
      color: lightgrey;
      text-decoration: underline;
    }
  </style>

</head>
<body class="light-blue darken-4">
  <div class="container">

    <!--Back to Login button-->
    <div class="row"></br>
      <div class="col s12">
        <form id="eloginbtn" action="index.php">
          <button class="btn waves-effect waves-light black" type="submit" name="elogin">
            Back to Login <i class="material-icons right">arrow_forward</i>
          </button>
        </form>
      </div>
    </div>

    <!--CPSC Logo-->
    <div class="row"></div>
    <div class="row">
      <div class="col s12"><img src="images/CPSCLogo.png" style="float:center"/></div>
    </div>
    
    <!--change password form-->
    <div class="row">
    <form id="loginform" class="col s6 offset-s3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="email">Email:</label>
            <input name="email" type="email"/>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <label for="password">New Password:</label>
            <input name="password" type="password"/>
          </div>
        </div>
        <?php
          if ($error && !empty($email) && !empty($epassword)) {
            echo "<label class='errlabel'>Error: There is not an account registered with this email.</label><br/>";
          }
        ?>
        <button class="btn waves-effect waves-light black" type="submit" name="submit">
            Change Password <i class="material-icons right">arrow_forward</i>
        </button>
    </form>
    </div>

  </div>


</body>
</html>