<?php
  $email = "";
  $epassword = "";
  $error = false;

  if(isset($_POST["submit"])) {
    if(isset($_POST["email"])) $email=$_POST["email"];
    if(isset($_POST["password"])) $epassword=$_POST["password"];
  }

  if(!$error) {
    include 'dbconnect.php';
    $sql = "select * from cpsc.employee where email='$email' and password='$epassword'";
    $result = $conn->query($sql);
    $row=mysqli_fetch_array($result);
    if($row) {
      Header("Location:about.php");
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
  <title>Login</title>
  <!--Google Icon Font Style-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Materialize.css style-->
  <link type="text/css" rel="stylesheet" href="Style/materialize/css/materialize.min.css"  media="screen,projection"/>
  <!--Materialize javascript style-->
  <script type="text/javascript" src="Style/materialize/js/materialize.min.js"></script>
  <!--personal style page-->
  <link href="Style/MainStyle.css" rel="stylesheet">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-H921JMT6L9"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-H921JMT6L9');
  </script>

  <style type="text/css">
    img{
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    form {
      text-align: center;
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

  <!--CPSC Logo-->
    <div class="row"></br></br></br></div>
    <div class="row">
      <div class="col s12"><img src="images/CPSCLogo.png" style="float:center"/></div>
    </div>
    
    <!--login form-->
    <div class="row">
    <form class="col s6 offset-s3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
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
          if ($error && !empty($email) && !empty($epassword)) {
            echo "<label class='errlabel'>Error: Please enter a valid email and password.</label><br/>";
          }
        ?>
        <button class="btn waves-effect waves-light black" type="submit" name="submit">
            Login <i class="material-icons right">arrow_forward</i>
        </button>
    </form>
    </div>

    <!--new user registration label and link-->
    <div class="row">
      <div class="col s4 offset-s4">
        <p id="newusertxt">Not a user? <a id="newuserlink" href="#">Register</a></p>
      </div>
    </div>
  </div>

  <!--TEMPORARY LOGIN BYPASS DELETE THIS-->
  <a href="about.php">BYPASS DELETE EVENTUALLY</a>


</body>
</html>