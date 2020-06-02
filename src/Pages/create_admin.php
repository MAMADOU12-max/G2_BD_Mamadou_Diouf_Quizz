<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation's Adiministrator</title>
    <style> 
      body {
            background-image: url('../../asset/IMG/image1.jpg');
            background-size: cover ;
            height: 10%;
        }
        .input-form{
          display:flex;
          display:block;
          width: 100% ;
          box-shadow: 0 2px 10px rgba(0,0, 0, 0.2); 
        }
        .error_form{
           display:block;
          margin-top:-15px;
          color:red;
        }
    </style>
    <!-- bootstrap local -->
    <link rel="stylesheet" href="../../asset/CSS/bootstrap.css">
</head>
<body>

<?php
            include('commun_admin.html') ;
      ?>
    
    <form action="" method="POST">


    <div class="row   m-4" style="width: 95%  ; display:flex; justify-content: center; height: 440px;">
      
      <div class='col-lg-12 col-md-10 col-sm-10 col-10 bg-dark justify-content-around'>
           <div class="row">
               <div class="col-lg-4 col-md-4 m-md-4  col-sm-12 m-sm-4 m-lg-4 col-10 mx-4 bg-light rounded" style="width: 80% ;height:440px" >
               <div class="afficher"> </div>
                     <input type="file" name="" id="">
               </div>
                 
               <!-- inscription -->
               <div class="col-lg-7 col-md-6 col-sm-10 bg-light m-4 justify-content-arround rounded" style="width: 80%  ;height:440px" >
                     <!-- form incription -->
                 <div class="row">
                   <div class="col-lg-6 col-md-6 col-sm-12 col-12 ">  
                    
                         <label for=""><strong>FIRSTNAME</strong></label>
                         <input type="text"  id="form_firstname" class="input-form" name="firstname" id=""><br> 
                         <span class="error_form" id="firstname_error_message"> </span>  
                        
                         <label for=""><strong>LASTNAME</strong></label>
                         <input type="text" id="form_lastname" class="input-form" name="lastname" ><br> 
                         <span class="error_form" id="lastname_error_message"> </span>     

                         <label for=""><strong>LOGIN</strong></label>
                         <input type="text" id="form_login" class="input-form" name="login" id=""><br> 
                         <span class="error_form" id="login_error_message"></span> 

                         <label for=""><strong>PASSWORD</strong></label>
                         <input type="text" id="form_password" class="input-form" name="password" id=""><br> 
                         <span class="error_form" id="password_error_message"></span> 

                         <label for=""><strong>RETYPE PASSWORD</strong></label>
                         <input type="text" id="form_retype_password" class="input-form" name="Confirmation" id=""><br> 
                         <span class="error_form" id="retype_password_error_message"></span> 
                    
                   </div>
                   <!-- submit picture -->
                   <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-5 bg-light">
                    
                         <div class="row">
                           <input type="file" name="" id=""><br>
                           Lorem ipsum dolor, sit amet consectetur a
                           dipisicing elit. Enim 
                           veniam ratione, nostrum consequuntur s
                           apiente doloribus distinctio eius totam laboriosam amet?

                         </div>
                         <input type="submit" id="button" value="Create Account"> 
                    
                   </div>
                 </div>

               </div>
           </div>
      </div>
   
   </div>
 
    </form> 

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../asset/JS/create_admin.js"></script>
    <script>

          $(document).ready(function(){
              
                  //  we hide messages errors 
    $("#firstname_error_message").hide();
    $("#lastname_error_message").hide();
    $("#login_error_message").hide();
    $("#password_error_message").hide();
    $("#retype_password_error_message").hide();
  
    //init variable false
    var error_firstname = false ;
    var error_lastname = false ;
    var error_login = false ;
    var error_password= false ;
    var error_retype_error_password = false ;

    //where we're out inputs call function check
    $("#form_firstname").focusout(function(){
         check_firstname() ;
    }) ;
    $("#form_lastname").focusout(function(){
         check_lastname() ;
    }) ;
    $("#form_login").focusout(function(){
         check_login() ;
    }) ;
    $("#form_password").focusout(function(){
      check_password() ;
    }) ;
    $("#form_retype_password").focusout(function(){
      check_retype_password() ;
    }) ;

    // here is functions
    function check_firstname(){
      var firstname_length = $("#form_firstname").val().length ;
      if(firstname_length < 5 || firstname_length > 20 ){
        $("#firstname_error_message").html("should be between 5-20 characters") ;
        $("#firstname_error_message").show() ;
        error_firstname = true ;
      }else{
        $("#firstname_error_message").hide() ;
      }
    } 

    function check_lastname(){
      var lastname_length = $("#form_lastname").val().length ;
      if(lastname_length < 2 || lastname_length > 20 ){
        $("#lastname_error_message").html("should be between 2-20 characters") ;
        $("#lastname_error_message").show() ;
        error_lastname = true ;
      }else{
        $("#lastname_error_message").hide() ;
      }
    } 

    function check_login(){
        var pattern = new RegExp(/^[+a-zA-Z._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i) ;

        if (pattern.test($("#form_login").val())) {
           $("#login_error_message").hide();
        }else{
          $("#login_error_message").html("Invalid email address") ;
          $("#login_error_message").show() ;
          error_login = true ;
        }
    }

    function check_password(){
      var password_length = $("#form_password").val().length ;
      if(password_length < 8){
        $("#password_error_message").html("password must contain at least 8 characters") ;
        $("#password_error_message").show();
        error_password= true ;
      }else{
        $(password_error_message).hide() ;
      }
    } 

    function check_retype_password(){
      var password = $("#form_password").val() ;
      var retype_password = $("#form_retype_password").val() ;
      
      if (password != retype_password) {
          $("#retype_password_error_message").html("Passwords don't match") ;
          $("#retype_password_error_message").show() ;
          error_retype_password = true ;
      }else{
        $("#retype_password_error_message").hide() ;
      }
    } 

             
             $("#button").click(function(){

                       error_firstname = false ;
                      error_lastname = false ;
                      error_login = false ;
                      error_password = false ;
                      error_retype_password = false ;

                      check_firstname();
                      check_lastname() ;
                      check_login() ;
                      check_password() ;
                      check_retype_password() ; 

                    //recup values
                      var  firstname = $('#form_firstname') .val()  ;
                        var lastname = $('#form_lastname').val()  ;
                        var login = $('#form_login').val() ;
                        var password = $('#form_password').val() ; 
                        var confirmation = $('#form_retype_password') ;
           
                  if(error_firstname == false && error_lastname == false && error_login == false && error_password == false && error_retype_password == false) {
         
                    var donnes = 'nom='+firstname+'&prenom='+lastname+'&login='+login+'&password='+password  ;
                    // alert(nom);
                    $.ajax( {
                        type : "POST" ,
                        url : "sendPlayer.php" ,
                        data : donnes ,
                        success : function (){
                            alert("Send");
                            console.log(donnes);
                        }
                    } );

                }else{
                    alert('invalid') ;
                } 
                
             });
          });
    </script>
</body>
</html>