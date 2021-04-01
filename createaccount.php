<?php
    $accounttype = "";
    $fname = "";
    $lname = "";
    $phone = "";
    $email = "";
    $dob = "";
    $hiredate = "";
    $address = "";
    $newacctpassword = "";
    $error = false;

    if(isset($_POST["submit"])) {
        if(isset($_POST["accounttype"])) $accounttype=$_POST["accounttype"];
        if(isset($_POST["firstname"])) $fname=$_POST["firstname"];
        if(isset($_POST["lastname"])) $lname=$_POST["lastname"];
        if(isset($_POST["phone"])) $phone=$_POST["phone"];
        if(isset($_POST["email"])) $email=$_POST["email"];
        if(isset($_POST["dob"])) $dob=$_POST["dob"];
        if(isset($_POST["hiredate"])) $hiredate=$_POST["hiredate"];
        if(isset($_POST["address"])) $address=$_POST["address"];
        if(isset($_POST["password"])) $newacctpassword=$_POST["password"];

        if(!empty($accounttype) && !empty($fname) && !empty($lname) && !empty($phone) && !empty($email) && !empty($dob) && !empty($hiredate)
            && !empty($address) && !empty($newacctpassword)){
            
            //if employee account
            if($accounttype=="Employee"){
                session_start();
                include 'dbconnect.php';
                $sql = "insert into cpsc.employee (First_Name, Last_Name, Phone, Email, DOB, Hire_Date, Address, Assigned_Manager, Password)
                        values ('$fname', '$lname', '$phone', '$email', '$dob', '$hiredate', '$address', ".$_SESSION['managerid'].", '$newacctpassword')";
                $result = $conn->query($sql);

                //javascript to display a confirmation message
                echo '<script type="text/javascript">';
                echo 'alert("The new account has been created!")';
                echo '</script>';
            }

            //if manager account
            if($accounttype=="Manager"){
                include 'dbconnect.php';
                $sql = "insert into cpsc.manager (First_Name, Last_Name, Phone, Email, DOB, Hire_Date, Address, Password)
                        values ('$fname', '$lname', '$phone', '$email', '$dob', '$hiredate', '$address', '$newacctpassword')";
                $result = $conn->query($sql);

                //javascript to display a confirmation message
                echo '<script type="text/javascript">';
                echo 'alert("The new account has been created!")';
                echo '</script>';
            }
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
  <title>Create Account</title>
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
    #crtacctform {
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
            <div class="col s12"><h3><strong>Create an Account</strong></h3></div>
        </div>

        <!--create account form-->
        <div class="row">
            <form id="crtacctform" class="col s4 offset-s4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="input-field">
                    <select name="accounttype">
                        <option value="" disabled selected>Choose Account Type</option>
                        <option value="Employee">Employee</option>
                        <option value="Manager">Manager</option>
                    </select>
                    <label>Account Type</label>
                </div>

                <div class="input-field">
                    <label for="firstname">First Name</label>
                    <input name="firstname" type="text"/>
                </div>

                <div class="input-field">
                    <label for="lastname">Last Name</label>
                    <input name="lastname" type="text"/>
                </div>

                <div class="input-field">
                    <label for="phone">Phone Number</label>
                    <input name="phone" type="text"/>
                </div>

                <div class="input-field">
                    <label for="email">Email</label>
                    <input name="email" type="email"/>
                </div>

                <div class="input-field">
                    <label for="dob">Date of Birth</label>
                    <input name="dob" type="date" placeholder=""/>
                </div>

                <div class="input-field">
                    <label for="hiredate">Hire Date</label>
                    <input name="hiredate" type="date" placeholder=""/>
                </div>

                <div class="input-field">
                    <label for="address">Address</label>
                    <input name="address" type="text"/>
                </div>

                <div class="input-field">
                    <label for="password">Password</label>
                    <input name="password" type="password"/>
                </div>

                <?php
                    if ($error) {
                        echo "<label class='errlabel'>Error: Please fill out all fields.</label><br/>";
                    }
                ?>

                <button class="btn waves-effect waves-light black" type="submit" name="submit">
                    Create Account <i class="material-icons right">add</i>
                </button>
            </form>
        </div>

    </div>
</body>
</html>