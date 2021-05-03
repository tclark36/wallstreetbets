<?php
  $email = "";
  $mpassword = "";
  $error = false;

  if(isset($_POST["submit"])) {
    if(isset($_POST["email"])) $email=$_POST["email"];
    if(isset($_POST["password"])) $mpassword=$_POST["password"];
  }

  if(!$error) {
    include 'dbconnect.php';
    $sql = "select * from cpsc.manager1 where email='$email' and password='$mpassword'";
    $result = $conn->query($sql);
    $row=mysqli_fetch_array($result);
    if($row) {
        session_start();
        $_SESSION['managerid'] = $row["Manager_ID"];
        Header("Location:mlandingpage.php");
    } else {
        $error = true;
    }
  }
?>

<!DOCTYPE html>
<html lan="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Login</title>
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

    <!--Employee Login button-->
    <div class="row"></br>
      <div class="col s12">
        <form id="eloginbtn" action="index.php">
          <button class="btn waves-effect waves-light black" type="submit" name="elogin">
            Employee Login <i class="material-icons right">arrow_forward</i>
          </button>
        </form>
      </div>
    </div>

    <!--CPSC Logo-->
    <div class="row"></div>
    <div class="row">
      <div class="col s12"><img src="images/CPSCLogo.png" style="float:center"/></div>
    </div>
    
    <!--login form-->
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
            <label for="password">Password:</label>
            <input name="password" type="password"/>
          </div>
        </div>
        <?php
          if ($error && !empty($email) && !empty($mpassword)) {
            echo "<label class='errlabel'>Error: Please enter a valid email and password.</label><br/>";
          }
        ?>
        <button class="btn waves-effect waves-light black" type="submit" name="submit">
            Login <i class="material-icons right">arrow_forward</i>
        </button>
    </form>
    </div>

  </div>


</body>
</html>