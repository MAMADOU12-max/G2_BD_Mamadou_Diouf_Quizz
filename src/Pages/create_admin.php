<?php
  //sgn out  
  if (isset($_POST['logout'])) {
      header( 'location:../../index.php'); 
  }
  
     // chargement de l'image
     if(isset($_POST['img_charge'])){ 
                              
        $dossier = '../../asset/IMG/Images/img/';
        $fichier = basename($_FILES['avatar']['name']);
        $taille_maxi = 1000000;
        $taille = filesize($_FILES['avatar']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['avatar']['name'], '.'); 
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
             $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if($taille>$taille_maxi)
        {
             $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
             //On formate le nom du fichier ici...
             $fichier = strtr($fichier, 
                  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
             $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
             if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
             {
                  echo 'Upload effectué avec succès !';
             }
             else //Sinon (la fonction renvoie FALSE).
             {
                  echo 'Echec de l\'upload !';
             }
        }
        else
        {
             echo $erreur;
        }
   }else{ $fill_tof = "" ;}

?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation's Adiministrator</title>
    <style> 
      
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
        .cercle{
          background-image: url('../../asset/IMG/images/avatar.jpg');
          width: 180px;
          height: 180px;
          position: relative;
          margin-top:15%;
     
          border-radius: 130px;
          border: 2px solid black;
        }
    </style>  
    <!-- bootstrap local -->
     <link rel="stylesheet" href="../../asset/CSS/bootstrap.css">
</head>
<body>  
   <form action="" method="POST">
     <?php
        include('commun_admin.php') ;
     ?>

       <div class="container-fluid ">
           <div class="row m-lg-5 m-md-5 m-sm-2 bg-dark">
               <div class="col-lg-4 col-md-4 col-sm-10 col-9 m-3  bg-light " style="height:70vh">
                  <?php
                       include('photo.php') ;
                  ?> 
               </div>

               <div class="col-lg-4 col-md-4 col-sm-10  col-9 m-3 bg-light" style="height:440px;">
                  <!-- form inscription -->
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

               <div class="col-lg-3 col-md-3 col-sm-10 col-9 m-lg-3 m-md-3 m-sm-2 m-2 text-center bg-light">

                    <h4><b>Save your picture please</b></h4> 
                       <!--choose maxxx size-->
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
                          <!---input file and code for download image-->                          
                         <input type="file" id="form_avatar" class="bouton" class="form-control" 
                          onchange="document.getElementById('photo').src=window.URL.createObjectURL(this.files[0])"> 
                              <!--place i want show photo-->
                          <div class="cercle"> 
                                <img name="img_charge" style="height: 170px; width: 170px; border-radius: 130px;" id="photo" alt="" >
                            
                                <div style="margin-left:96px;" class="error"><?php echo $fill_tof  ;?></div>
                          </div>
  
                           <!-- buttons -->
                           <input type="submit" name="button" class="btn btn-secondary btn-lg btn-block mt-4" id="button" value="Create Account"><br>
                          <button class="btn btn-outline-warning" name="logout"> LOG OUT </button> 
               </div>

           </div>
       </div>
       
  </form>     
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../asset/JS/create_admin.js"></script>
    
  </body>
</html>
 
 
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
                    alert('invalid data') ;
                } 
                
             });
          });
    </script>
 