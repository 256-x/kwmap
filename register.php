<?php


    session_start();

    /*if ($_SESSION['signup'] == "true") {

      echo "Already registered once";
      exit;

    }
    */ 


        //connect to database

    $conn = mysqli_connect('localhost', 'leuser', '123', 'keywordmap');

    if (!$conn) {

    	die("connection failed");

    }


    //handle Signup Process

    $email_signup = $_POST['email-signup'];


    //check if email already exists in Database

    $sql = "SELECT `email` FROM `users` WHERE `email` = '".$email_signup."'";

   	$result = mysqli_query($conn, $sql);

   	$emailExists = "false";

   	while ($row = mysqli_fetch_array($result)) {

   		if ($row['email'] == $email_signup) {

   			echo "This E-Mail already exists!";

   			$emailExists = "true";

   		}

   	}

   	// INSERT new user in Database if email doesnt exist already

   	if ($emailExists == "false" && $email_signup) {


   		$sql2 = "INSERT INTO `users` (email, t_signup) VALUES ('".$email_signup."', '".time()."')";

   		if(mysqli_query($conn, $sql2)) {

        $_SESSION['count'] = 0; 

        //header('Location: index.php');
   			
        echo "Yeah bro u got signed up!";

        $_SESSION['signup'] = "true";

   			//need to set Cookie here

   			//check if checkbox is checked

			/*if ($_GET['checkbox-signup']) {

				setcookie("testcookie-signup", $email_signup, time() + 60*60);

			}

			$_SESSION['email-signup'] = $email_signup;

			header('Location: success.php');
      */

   		} else {

   			echo "Regristration failed";
   		}

   	}

   