<!DOCTYPE html>
<html lan="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
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
    #aboutimg {
        display: block;
        margin-left: auto;
        margin-right: auto;
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
                    <a class='dropdown-trigger btn light-blue darken-4' href='#' data-target='navdropdown'>Menu</a>
                    <ul id='navdropdown' class='dropdown-content'>
                        <li><a href="about.php">About</a>
                        <li><a href="items.php">Recalls</a>
                        <li><a href="listings.php">Listings</a>
                        <li><a href="#">Letters</a>
                        <li><a href="reports.php">Reports</a>
                        <li><a href="#">Search</a>
                        <li><a href="profile.php">Profile</a>
                        <li><a href="index.php">Logout</a>
                    </ul>
                </th>
            </tr>
        </thead>
    </table>

    <div class="container">

        <!--About CPSC title-->
        <div class="row">
            <div class="col s12"><h3><strong>About CPSC</strong></h3></div>
        </div>
        
        <!--About CPSC image-->
        <div class="row">
            <div class="col s12"><img src="images/CPSCPeople.jpg" width="1000" height = "400" id="aboutimg"/></div>
        </div>

        <!--about CPSC text blurb-->
        <div class="row">
            <div class="col s12">
                <P>
                    CPSC is charged with protecting the public from unreasonable risks of injury or death associated with the use of the thousands of types of consumer 
                    products under the agency's jurisdiction. Deaths, injuries, and property damage from consumer product incidents cost the nation more than $1 trillion annually. 
                    CPSC is committed to protecting consumers and families from products that pose a fire, electrical, chemical, or mechanical hazard. CPSC's work to ensure 
                    the safety of consumer products - such as toys, cribs, power tools, cigarette lighters, 
                    and household chemicals - contributed to a decline in the rate of deaths and injuries associated with consumer products over the past 40 years.
                </P>
            </div>
        </div>
    </div>
</body>
</html>