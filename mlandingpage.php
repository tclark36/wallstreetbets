<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager</title>
  <!--Google Icon Font Style-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Materialize.css style-->
  <link type="text/css" rel="stylesheet" href="Style/materialize/css/materialize.min.css"  media="screen,projection"/>
  <!--Materialize javascript style-->
  <script type="text/javascript" src="Style/materialize/js/materialize.min.js"></script>
  <!--personal style page-->
  <link href="Style/MainStyle.css" rel="stylesheet">
  <script src="jquery-3.1.1.min.js"></script>
  <!--initialize all materialize stuf-->
  <script>
      $(function(){
          M.AutoInit();
      })
  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-192315482-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-192315482-1');
  </script>

  <style type="text/css">
    h3 {
        text-align: center;
    }
    form {
        text-align: center;
    }
    button {
        width: 20%;
    }
  </style>
</head>
<body>
    <!--header-->
    <table class="light-blue darken-4">
        <thead>
            <tr>
                <th style="width:3%" class="headertbl"><img src="images/CPSCLogo.png" width="50" height="50"/></th>
                <th class="headertbl"><label class="headerlbl"><strong>CPSC</strong></label></th>
            </tr>
        </thead>
    </table>

    <div class="container">

        <!--what would you like to do title-->
        <div class="row">
            <div class="col s12"><h3><strong>What would you like to do?</strong></h3></div>
        </div>

        <!--create account button-->
        <div class="row"></br>
            <div class="col s12">
                <form action="createaccount.php">
                    <button class="btn waves-effect waves-light btn-large black" type="submit" name="createaccountbtn">
                        Create Account <i class="material-icons right">add</i>
                    </button>
                </form>
            </div>
        </div>

        <!--view dashboard button-->
        <div class="row"></br>
            <div class="col s12">
                <form action="about.php">
                    <button class="btn waves-effect waves-light btn-large black" type="submit" name="dashboardbtn">
                        View Dashboard <i class="material-icons right">arrow_forward</i>
                    </button>
                </form>
            </div>
        </div>

        <!--view reports button-->
        <div class="row"></br>
            <div class="col s12">
                <form action="mreports.php">
                    <button class="btn waves-effect waves-light btn-large black" type="submit" name="reportsbtn">
                        View Reports <i class="material-icons right">assessment</i>
                    </button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>