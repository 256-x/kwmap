



        //ajax stop

        function isValidEmailAddress(emailAddress) {
          var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
          return pattern.test(emailAddress);
      }

        $(document).ajaxStop(function () {


          $('#suggestions_header').prepend($('.item').length + " ");

          if ($('#limit_reached').html() == "Limit reached!") {

            $('.output_head').hide();

            //Email Signup Homepage

          

         $('#email-submit').click(function(event){

                event.preventDefault();


          if ($('#email-signup').val() != "" && isValidEmailAddress($('#email-signup').val())) {


              
                  $.ajax({
                        type: "POST",
                        url: 'register.php',
                        data: $("#email-signup").serialize(), // serializes the form's elements.
                        success: function(data)
                        {

                        if (data == "Yeah bro u got signed up!") {

                          $('.output_body').html("");
                          alert("Signup complete! You can now use the tool again!")



                        } else if (data == "This E-Mail already exists!") {


                          alert("This E-Mail is already signed up!")

                        } else if (data == "Already registered once") {
                           $('.output_body').html("");
                          alert("You already signed up!")
                          

                        }


                         // show response from the php script.
                    }
                })

                }

                 
          })
        }

      })


     

     
 
        //toggle class to active, if span is clicked

        $(document).on('click', '.item', function() {

              $(this).toggleClass('active')

                var numItems = $('.active').length;

                $('#selection').html(" KWs: "+ numItems);

             

              })


      // get keywords


  $(document).ready(function(){

    root = ""

    $('#keyword').focus()

   
    //hide tooltip from input bar if selected

    $('#keyword').focus(function () {


        $('#keyword').tooltip('hide');
    })

    //hide buttons at start

     $('#selection').hide();
     $('#copy_all').hide();
     $('#export').hide();


     //hide output background at start

     $('.output_body_wrapper').hide();

     var activekw = "";


    $("#btn").click(function(event) {


      //check input if empty or already typed in

      if ($('#keyword').val() != "" && $('#keyword').val() != activekw) {


        activekw = $('#keyword').val()

        if(! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 
          setRoot();
        }

        

        
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
          $('.output_body_wrapper').show();


    
        }
        





      });


      return false;

    } else {

     $('#selection').hide();
     $('#copy_all').hide();
     $('#export').hide();
     event.preventDefault();

     //show tooltip

     
     $('#keyword').tooltip('show');


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

  // diagram test

  /*var root = {"name" : "Araneae", "children" : [

        {"name" : "Agelenidae", "children" : [


         ] },
        {"name" : "Araneidae", "children" : [
          
        ] },
           {"name" : "Araneidae", "children" : [
 
        ] },
           {"name" : "Araneidae", "children" : [
          
        ] },
           {"name" : "Araneidae", "children" : [
          
        ] },
           {"name" : "Araneidae", "children" : [
          
        ] },
           {"name" : "Araneidae", "children" : [
      
        ] },
           {"name" : "Ctenidae", "children" : [
         
        ] },
            {"name" : "Desidae", "children" : [
         

        ] },
                    {"name" : "Filistatidae", "children" : [
          
        ] },
                    {"name" : "Lycosidae", "children" : [
       

        ] },
                    {"name" : "Pholcidae", "children": [
         

        ] },
                    {"name" : "Salticidae", "children": [
          

        ] },
                    {"name" : "Sicariidae", "children": [
       

        ] },
                    {"name" : "keyword + A", "children": [
        

        ] }
        
                ]};


  */



function setRoot() {

    var stringdata = "keyword='" + $('#keyword').val() + "'";


    $.ajax({
        type: "GET",
        url: "request-small.php",
        data: stringdata,
        success: function(data){

          console.log(data)


          $('.output_canvas').html("");


          $('.output_canvas').html(data);

          //root = JSON.parse(data);
        //

          
          //console.log(root);
      }

    })


}


/*
function setCanvas() {



var diameter = 800;

var tree = d3.layout.tree()
    .size([360, diameter / 2 - 190])
    .separation(function(a, b) { return (a.parent == b.parent ? 1 : 2) / a.depth; });

var diagonal = d3.svg.diagonal.radial()
    .projection(function(d) { return [d.y, d.x / 180 * Math.PI]; });

var svg = d3.select(".output_canvas").append("svg")
    .attr("width", diameter + 20)
    .attr("height", diameter - 40)
  .append("g")
    .attr("transform", "translate(" + diameter / 2 + "," + diameter / 2 + ")");

  var nodes = tree.nodes(root),
      links = tree.links(nodes);

  var link = svg.selectAll(".link")
      .data(links)
    .enter().append("path")
      .attr("class", "link")
      .attr("d", diagonal);

  var node = svg.selectAll(".node")
      .data(nodes)
    .enter().append("g")
      .attr("class", "node")
      .attr("transform", function(d) { return "rotate(" + (d.x - 90) + ")translate(" + d.y + ")"; })

  node.append("circle")
      .attr("r", 5);

  node.append("text")
      .attr("dy", ".31em")
      .attr("text-anchor", function(d) { return d.x < 180 ? "start" : "end"; })
      .attr("transform", function(d) { return d.x < 180 ? "translate(8)" : "rotate(180)translate(-8)"; })
      .text(function(d) { return d.name; });

d3.select(self.frameElement).style("height", diameter - 150 + "px");
}

*/