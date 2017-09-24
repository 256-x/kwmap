<!DOCTYPE html>
<html>
<head>
	<title>About</title>

	  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>


  body {

  	font-family: Helvetica;

  }




  #particles-js {

  background-color: #262626;
  position:fixed;
  top:0;
  right:0;
  bottom:0;
  left:0;
  z-index:0; 
  }


  #overlay {

	 position: relative;

	 color: White;
  }

  .top {

  	max-width: 740px;
  	margin: 0 auto;
  	margin-top: 10vh;


  }

  h1 {

  	font-size: 58px;

  }

  p {
  	
  	font-size: 24px;
  	margin-top: 15px;
  	
  }



  





	</style>
</head>


<body>

	    <!-- Init particle background !-->

    <div id="particles-js"></div>




	<div id="overlay" class="container text-center">


		<div class="col-md-4 top">

			<h1>About this site</h1>

			<p>keywordmap.io was created to help you with related and long tail keywords.<br></br>

			<p>You can easily copy the suggested keywords to your clipboard or download them in a .txt file.</p>

      <p>Currently the map is disabled for the mobile version, only the keywords will show.</p>
				   
			</p>

		</div>


        <div class="form-inline justify-content-center">
          <p>You can also sign up on the Newsletter and get notified when I release new tools!</p>
          <form action="register.php">
          <input class="form-control" type="email" placeholder="E-Mail" id="email-signup-about" name="email-signup"></input>
          <button id="email-submit-about" class="btn btn-primary">Sign Up!</button>
          </form>
    </div>


    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">

	  <div class="footer row justify-content-center align-self-center mx-auto">


        <a href="index.php">Home</a>

        <a href="about.php" style="padding-left: 20px">About</a>

        <a href="legal.php" style="padding-left: 20px">Legal Notice</a>

      </div>
         
    </nav>

	</div>


<script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript" src="particles.js"></script>
<script type="text/javascript" src="app.js"></script>
<script type="text/javascript" src="about-scripts.js"></script>
</body>
</html>