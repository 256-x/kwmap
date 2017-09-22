<?php



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script type="text/javascript" src="d3.js" charset="utf-8"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css"/>

  </head>



  <body>

    <!-- Init particle background !-->

    <div id="particles-js"></div>

    <div id="overlay" class="main text-center">



      <div class="top">

      <h1><span id="word1">keywordmap</span><span id="word2">.io</span></h1>

      <!-- form -->

      <form class="form-inline justify-content-center" id="analyze" name="analyze" method="POST">

        <div class="form-group" id="input_head"> 
          
          <input id="keyword" class="form-control-lg" type="text" name="keywords" placeholder="Enter Keyword here" data-placement="bottom" data-toggle="tooltip" title="Please enter a keyword"></input>
      
          <button id="btn" class="btn btn-primary btn-lg">Suggest!</button>
      
         </div>
      </form>

    </div>

      <!-- Output area !-->

      <div class="output_canvas"></div>

      <div class="output">

      <div class="output_head">

        <div class="output_head_left">

          <button class="btn btn-primary" id="selection">
             
             Selection</button>
        </div>


        <div class="output_head_right">

          <button class="btn btn-primary" id="copy_all" data-toggle="tooltip" data-placement="top" title="Copied!" data-clipboard-target=".output_body"> Copy all</button>

          <button class="btn btn-primary" id="export">Export all </button>

        </div>

      </div>

      <div class="output_body_wrapper">

        <div class="output_body_canvas"></div>
        <div class="output_body" id="output_body">

      </div>
      
      </div>

      <div class="chart text-center"></div>


      <!--footer -->

      <div class="footer fixed-bottom">

        <a href="index.php">Home</a>

        <a href="about.php" style="padding-left: 20px">About</a>

        <a href="legal.php" style="padding-left: 20px">Legal Notice</a>

      </div>
         
 
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Selected Keywords</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="copy btn btn-primary" id="copy" data-clipboard-target=".modal-body" data-toggle="tooltip" data-placement="top" title="Copied!"> Copy to Clipboard</button>
          </div>
        </div>
      </div>
    </div>

    <!-- script output 
//

   <div id="container">
  <div id="search">
      
      <div id="left">
        <h2>Google Suggest Scraper</h2>
    <form id="analyze" name="analyze" method="POST" action="report.php">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" id="table_search">
            <tr>
              <th align="center" scope="row">Keyword</th>
              <td><input type="text" value="" id="keywords" name="keywords" class="field" /></td>
            </tr>
            <tr>
              <th align="center" scope="row">Level</th>
              <td><input type="radio" name="level" value="basic" checked="checked" /> Basic(A - Z) <input type="radio" name="level" value="advance" /> Advance(AA - ZZ)</td>
            </tr>        
            <tr>
              <th scope="row">&nbsp;</th>
              <td><input type="submit" value="Go!" class="orange" /></td>
            </tr>
          </table>
          </form>
        </div>
        
        <div id="right">

  </div>      
        
    </div>
      
      <div class="clear"></div>
      <div style="display:none;" id="loading"><br />
        <img style="margin-left:150px;" src="images/loading01.gif" alt="Loading..." />  
      </div>      
    <div id="se_data"></div>

  -->


  </div>

  
      </div>

    

    </div>




    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>
    <script type="text/javascript" src="clipboard.min.js"></script>
    <script type="text/javascript" src="filesaver.min.js"></script>
    <script type="text/javascript" src="scripts.js"></script>

    
   
</body>
</html>