<?php
session_start();

if($_GET['logout']==1 AND $_SESSION['id'])
{
    session_destroy();
    $message = "You have been logged out. Have a nice day!";
    session_start();
}

include("connection.php");
if($_POST['submit'] == "Sign Up")
{
    if(!$_POST['email'])
    {
        $error.= "<br /> Please Enter Your Email";
    }
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $error.= "<br /> Please enter a valid email address";
    }
    if(!$_POST['password'])
    {
        $error.="<br /> Please enter a password";
    }
    else
    {
        if(strlen($_POST['password'])<8)
        {
            $error.="<br/> Please enter a password with atleast 8 characters";
        }
        if(!preg_match('`[A-Z]`', $_POST['password']))
        {
            $error.="<br/> Please include atleast one capital letter in your password";
        }
    }
    if($error)
    {
        $error = "There were error(s) in your sign up details".$error;
    }
    else
    {
        $query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";

        $result = mysqli_query($link, $query);
        $results = mysqli_num_rows($result);
        if($results)
        {
            $error = "That email address is already registered. Do you want to login?";
        }
        else
        {
            $query = "INSERT INTO `users` (`email`, `password`) VALUES('".mysqli_real_escape_string($link,
                    $_POST['email'])."','".md5(md5($_POST['email'].$_POST['password']))."')";

            mysqli_query($link, $query);

            $_SESSION['id'] = mysqli_insert_id($link);

            print_r($_SESSION);

            header("Location: ../mantra/calendar/index.php");
        }
    }
}

if($_POST['submit'] == "Login")
{
    $query = "SELECT * FROM users where email='".mysqli_real_escape_string($link, $_POST['loginemail'])."'
                                          AND password='".md5(md5($_POST['loginemail'].$_POST['loginpassword']))."' LIMIT 1";
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    if($row)
    {
        $_SESSION['id'] = $row['id'];

        header("Location: ../mantra/calendar/index.php");
    }
    else
    {
        $error =  "Could not find a user with that email and password. Please try again";
    }
}

?>