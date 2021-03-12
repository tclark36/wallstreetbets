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
  <style type="text/css">
    img{
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
  </style>

</head>
<body class="light-blue darken-4">
  <div class="container">
    <div class="row">
      <div class="col s12"><h1>Login</h1></div>
    </div>
    <div class="row">
      <div class="col s12"><img src="images/CPSCLogo.png" style="float:center"/></div>
    </div>
    
    <!--login form-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
        <label for="email">Email:</label>
        <input name="email" type="email"/>
        <br/>
        <label for="password">Password:</label>
        <input name="password" type="password"/>
        <br/>
        <button class="btn waves-effect waves-light green" type="submit" name="submit">
            Sign In <i class="material-icons right">arrow_forward</i>
        </button>
    </form>
  </div>

</body>
</html>