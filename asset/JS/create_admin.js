  
 
 

// $(document).ready(function(){
    
//         //  we hide messages errors 
//           $("#firstname_error_message").hide();
//           $("#lastname_error_message").hide();
//           $("#login_error_message").hide();
//           $("#password_error_message").hide();
//           $("#retype_password_error_message").hide();

//           //init variable false
//           var error_firstname = false ;
//           var error_lastname = false ;
//           var error_login = false ;
//           var error_password= false ;
//           var error_retype_error_password = false ;

//           //where we're out inputs call function check
//           $("#form_firstname").focusout(function(){
//           check_firstname() ;
//           }) ;
//           $("#form_lastname").focusout(function(){
//           check_lastname() ;
//           }) ;
//           $("#form_login").focusout(function(){
//           check_login() ;
//           }) ;
//           $("#form_password").focusout(function(){
//           check_password() ;
//           }) ;
//           $("#form_retype_password").focusout(function(){
//           check_retype_password() ;
//           }) ;

//           // here is functions
//           function check_firstname(){
//           var firstname_length = $("#form_firstname").val().length ;
//           if(firstname_length < 5 || firstname_length > 20 ){
//           $("#firstname_error_message").html("should be between 5-20 characters") ;
//           $("#firstname_error_message").show() ;
//           error_firstname = true ;
//           }else{
//           $("#firstname_error_message").hide() ;
//           }
//           } 

//           function check_lastname(){
//           var lastname_length = $("#form_lastname").val().length ;
//           if(lastname_length < 2 || lastname_length > 20 ){
//           $("#lastname_error_message").html("should be between 2-20 characters") ;
//           $("#lastname_error_message").show() ;
//           error_lastname = true ;
//           }else{
//           $("#lastname_error_message").hide() ;
//           }
//           } 

//           function check_login(){
//           var pattern = new RegExp(/^[+a-zA-Z._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i) ;

//           if (pattern.test($("#form_login").val())) {
//           $("#login_error_message").hide();
//           }else{
//           $("#login_error_message").html("Invalid email address") ;
//           $("#login_error_message").show() ;
//           error_login = true ;
//           }
//           }

//           function check_password(){
//           var password_length = $("#form_password").val().length ;
//           if(password_length < 8){
//           $("#password_error_message").html("password must contain at least 8 characters") ;
//           $("#password_error_message").show();
//           error_password= true ;
//           }else{
//           $(password_error_message).hide() ;
//           }
//           } 

//           function check_retype_password(){
//           var password = $("#form_password").val() ;
//           var retype_password = $("#form_retype_password").val() ;

//           if (password != retype_password) {
//               $("#retype_password_error_message").html("Passwords don't match") ;
//               $("#retype_password_error_message").show() ;
//               error_retype_password = true ;
//               }else{
//               $("#retype_password_error_message").hide() ;
//               }
//           } 

   
//           $("#button").click(function(){

//              error_firstname = false ;
//             error_lastname = false ;
//             error_login = false ;
//             error_password = false ;
//             error_retype_password = false ;

//             check_firstname();
//             check_lastname() ;
//             check_login() ;
//             check_password() ;
//             check_retype_password() ; 

//           //recup values
//             var  firstname = $('#form_firstname') .val()  ;
//               var lastname = $('#form_lastname').val()  ;
//               var login = $('#form_login').val() ;
//               var password = $('#form_password').val() ; 
//               var confirmation = $('#form_retype_password') ;
 
//         if(error_firstname == false && error_lastname == false && error_login == false && error_password == false && error_retype_password == false) {

//           var donnes = 'nom='+firstname+'&prenom='+lastname+'&login='+login+'&password='+password  ;
//           // alert(nom);
//           $.ajax( {
//               type : "POST" ,
//               url : "sendAdmin.php" ,
//               data : donnes ,
//               success : function (){
//                   alert("Send");
//                   console.log(donnes);
//               }
//           } );alert('okkkkkkkkkk')

//       }else{
//           alert('invalid') ;
//       } 
      
//    });
// });
 