<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Reports</title>
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
  </style>
</head>
<body>
    <!--header-->
    <table class="light-blue darken-4">
        <thead>
            <tr>
                <th style="width:3%" class="headertbl"><img src="images/CPSCLogo.png" width="50" height="50"/></th>
                <th class="headertbl"><label class="headerlbl"><strong>CPSC</strong></label></th>
                <th style="text-align: right" class="headertbl">
                    <form action="about.php">
                        <button class="btn waves-effect waves-light black" type="submit" name="viewdashboard">
                            View Dashboard <i class="material-icons right">arrow_forward</i>
                        </button>
                    </form>
                </th>
            </tr>
        </thead>
    </table>

    <div class="container">

        <!--create account title-->
        <div class="row">
            <div class="col s12"><h3><strong>Manager Reports</strong></h3></div>
        </div>
        </br>
        </br>

        <!--violations identified per employee report-->
        <div class="row">
            <div class="col s12">
                <iframe width="1024" height="612" src="https://app.powerbi.com/view?r=eyJrIjoiOTg2YWRlYjYtODI3Yi00YTUwLThkYjUtNWU4ODMxYTBiZWY3IiwidCI6IjYwOTU2ODg0LTEwYWQtNDBmYS04NjNkLTRmMzJjMWUzYTM3YSIsImMiOjF9" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>
        </br>
        </br>

        <!--notices sent per employee report-->
        <div class="row">
            <div class="col s12">
                <iframe width="1024" height="612" src="https://app.powerbi.com/view?r=eyJrIjoiOTFlODdmYTAtN2JlNS00YTNmLTg2MDktOWRlMDUxOTdiNWJlIiwidCI6IjYwOTU2ODg0LTEwYWQtNDBmYS04NjNkLTRmMzJjMWUzYTM3YSIsImMiOjF9" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>

    </div>
</body>
</html>