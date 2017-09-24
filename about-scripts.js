
             function isValidEmailAddress(emailAddress) {
                  var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
                  return pattern.test(emailAddress);
          };




          $('#email-submit-about').click(function(event){

                event.preventDefault();


          if ($('#email-signup-about').val() != "" && isValidEmailAddress($('#email-signup-about').val())) {


              
                  $.ajax({
                        type: "POST",
                        url: 'register.php',
                        data: $("#email-signup-about").serialize(), // serializes the form's elements.
                        success: function(data)
                        {

                        if (data == "Yeah bro u got signed up!") {

                          $('.output_body').html("");
                          alert("Signup successful!")



                        } else if (data == "This E-Mail already exists!") {


                          alert("This E-Mail is already signed up!")

                        } else if (data == "Already registered once") {
                           $('.output_body').html("");
                          alert("You already signed up!")
                          

                        }


                         // show response from the php script.
                    }
                });


          }


          })