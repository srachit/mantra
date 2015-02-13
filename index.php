<?php
include("login.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body data-spy="scroll" data-target=".navbar-collapse">
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Secret Diary</a>
        </div>
        <div class="collapse navbar-collapse">
            <form class="navbar-form navbar-right" method="post">
                <div class="form-group">
                    <input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginemail'])?>"/>
                </div>
                <div class="form-group">
                    <input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginpassword'])?>"/>
                </div>
                <button type="submit" name="submit" value="Login" class="btn btn-success">Log In </button>
            </form>
        </div>
    </div>
</div>

<div class="container contentContainer" id="topContainer">
    <div class="row">

        <div class="col-md-6 col-md-offset-3" id="topRow">

            <h1 class="marginTop">Project Mantra</h1>

            <p class="lead">Schedule Calendar Social Other Cool Words, Mehul fix this later</p>


            <?php
            if($error)
            {
                echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
            }
            if($message)
            {
                echo '<div class="alert alert-success">'.addslashes($message).'</div>';
            }
            ?>


            <p class="bold marginTop">Interested? Sign Up Below!</p>

            <form class="marginTop" method="post">

                <div class="form-group">

                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Your email" value="<?php echo addslashes($_POST['email']) ?>"/>

                </div>
                <div class="form-group">

                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo addslashes($_POST['password']) ?>"/>

                </div>
                <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop" />

            </form>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>