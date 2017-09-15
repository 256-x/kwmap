<?php



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css"/>

  </head>

  <style>

  .main {

  
        margin-top: 10%;
  }


  form {

    margin-top: 25px;
  }

  h1 {

    font-family: Helvetica;


  }

  #word1 {
    margin-left: -20px;
    color: #FF9933;
  }

  #word2 {

    color: #3399ff;
  }

  body {

    margin: 0;
    padding: 0;
    

  }

  #keyword {
    max-width: 250px;
    float: left;

  }

  input {

    box-sizing: border-box;
  }


  #btn {

    float: right;
    max-width: 130px;
    margin-left: 10px;
    background-color: #3399ff

  }

  #input_head {

    max-width: 400px;
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
  }

  .btn {

    background-color: #3399ff;

  }

  textarea {

    margin-top: 20px;

    width: 400px;
    height: 400px;

  }

  .output {

    margin-top: 20px;
    max-width: 400px;
    background-color: #262626;
    margin: 0 auto;
    margin-top: 20px;

  }

  .item::after {

  font-family: FontAwesome;
  content: "\f0fe";
  color: #3399ff;
  float: right;
  padding-right: 15px;
  }

  .item {

    display: inline-block;
    width: 100%;
    text-align: left;
    padding-left: 15px;
    cursor: pointer;
    color: white;
  }

  .item.selected::after {
  content: "\f00c";
}

  span:hover {
  background-color: #FF9933;
  }

  .output_body {

       margin-top: 20px;

  }

  .output_head {

    max-width: 400px;
  }

  .input_head {

    max-width: 400px;
  }

  .output_head_right {

    float:right;
    margin-bottom: 20px;

  }

  .output_head_left {

    float: left;
  }


  #selection::before {
    font-family: FontAwesome;
    content: "\f0c9";

  }

  #copy::before {
    font-family: FontAwesome;
    content: "\f0c5";

  }

  #export::after {
    font-family: FontAwesome;
    content: "\f08e";

  }


  .active::after{

    content: "\f00c"
  }

  @media screen and (max-width: 360px) {

    #keyword {float: none;}
    #btn { float: none; margin-top: 10px; }

  }

  @media screen and (max-width: 375px) {
    #keyword { width: 240px; }
    #input_head { margin: 5px; }
    .output_head { margin: 5px; }
  }

  @media screen and (max-width: 320px) {
    #word1 { margin: 0px; }
    .output_head_right { margin: 0px; }
    #selection { width: 105px; }
  }


  </style>



  <body>

    <!-- Init particle background !-->

    <div id="particles-js"></div>

    <div id="overlay" class="main text-center">

      <h1><span id="word1">keywordmap</span><span id="word2">.io</span></h1>

      <form class="form-inline justify-content-center" id="analyze" name="analyze" method="POST">

        <div class="form-group" id="input_head"> 
          <input id="keyword" class="form-control-lg" type="text" name="keywords" placeholder="Enter Keyword here"></input>
      
          <button id="btn" class="btn btn-primary btn-lg">Suggest!</button>
      
         </div>
      </form>

      <div>


    


      </div>

      <!-- Output area !-->

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

      <div class="output_body" id="output_body">

      
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

    
    <script type="text/javascript">


   
 
        //toggle class to active, if span is clicked

        $(document).on('click', '.item', function() {

              $(this).toggleClass('active')

                var numItems = $('.active').length;

                $('#selection').html(" KWs: "+ numItems);

             

              

              })



     





      







      // get keywords


  $(document).ready(function(){

    //hide buttons at start

     $('#selection').hide();
     $('#copy_all').hide();
     $('#export').hide();



    $("#btn").click(function() {

      if ($('#keyword').val() != "") {

       
      $.ajax({
        type: "POST",
        url: "ajax.php",
        data: $('#keyword').serialize(),
        beforeSend: function(XMLHttpRequest){
          $("#loading").css('display','inline');
          $('#se_data').empty();  
        }, 
        success: function(data){
          $("#loading").css('display','none');

          //show buttons




          $('.output_body').html(data);
          //$('.output_body').append(data)

            //if item is clicked, change class to active, update button with active count
              
        
          $('#selection').show();
         $('#copy_all').show();
         $('#export').show();




    
        }
        





      });


      return false;

    } else {

     $('#selection').hide();
     $('#copy_all').hide();
     $('#export').hide();


      alert("Please enter a keyword!")
    }




    });


    
  }); 

  function download_xls(){

      var xls_data = "";

      $("td.keywords_td").each(function() {
          xls_data = xls_data + "^^^" + $(this).text();
      });

      $('body').append('<form method="post" action="ajax.php" style="display:none;"><textarea name="download">' + xls_data + '</textarea></form>');
      $("form:last").submit();
  }


    var outputkws = ""


    //export all Button


    $('#export').click(function(){


      if ($('.item').length != 0) {
    
         $('.item').each(function() {

          outputkws += $(this).html() + "\n";


       })




        var text = outputkws
        var filename = "all-kws"
        var blob = new Blob([text], {type: "text/plain;charset=utf-8"});
        saveAs(blob, filename+".txt");


      } else {


      }


    });

        

    //disable copy all if there is no output

    var clipboard_all = ""

    $('#copy_all').click(function(event) {

      


      if ($('.item').length == 0) {

       event.preventDefault();

      } else {

        //loop through all items


        $('.item').each(function() {

          outputkws += $(this).html() + "\n";


       })


     
        var copyThis = outputkws

        clippy = new Clipboard('#copy_all', {
          text: function(trigger) {
            return copyThis;
        }

      })

        clippy.on('success', function(e) {
      
          $('#copy_all').tooltip('show');
          e.clearSelection();
     



    }); 


      }


    })


   
    //init clipboardjs

    new Clipboard('.btn');

    var clipboard_modal = new Clipboard('#copy')

    

    //Modal copy to clipboard -> tooltip

    clipboard_modal.on('success', function(e) {
      
      $('#copy').tooltip('show');
      e.clearSelection();
    });

    //tooltip for copy all

    



    

    //check if input is empty

    var kw = ""
    var modalContent = ""

    //Selection Button

    $("#selection").click(function(){





      if ($('.active').length != 0) {

        $('#myModal').modal('show');

        //reset 

        modalContent = ""

        $('.active').each(function(i, obj) {

          //append each active KW

          modalContent += $(this).html() + "<br>"

      })

        //set modal Body

        $('.modal-body').html(modalContent)



    }
      

    })


    /*$("#btn").click(function(event) {

      if ($('#keyword').val() == "") {

        event.preventDefault();
        alert("Please enter a keyword!");

        //also have to check if keyword is too long here

      } else {

        kw = $('#keyword').val();

        event.preventDefault();

        //do ajax request

        dat = { "keyword": "'" + kw +"'" }


        $.ajax({
          type: "POST",
          url: 'process.php',
          data: dat,
          dataType: "json",

          success: function(data) {

            

          

            //alert(data);

            var dat = "";


            //clear output

            outputkws = ""

            $('.output_body').html("");

            //loop through keywords and put them in spans

            for (i=0; i<Object.keys(data).length;i++) {

              dat = data[i] + "\n"

              $('.output_body').append('<span class="item">' + dat + "</span>");

              //variable to save all output KWs

              outputkws += dat

            }

              //if item is clicked, change class to active, update button with active count
              
              $('.item').click(function() {

                $(this).toggleClass('active')

                var numItems = $('.active').length;

                $('#selection').html(" KWs: "+ numItems);


                



              })



             




                     
          }




        })
      }




    })


  */


    </script>

</body>
</html>