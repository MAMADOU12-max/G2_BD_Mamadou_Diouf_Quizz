 <?php
    session_start();
    //sgn out  
    if (isset($_POST['logout'])) {
        header( 'location:../../index.php'); 
    }

    //  $idjueur=$_SESSION['user']['id'];
    // var_dump($idjueur);
    $p=isset($_GET['p'])?$_GET['p']:'';
    // if (!isset($_SESSION['user']['password'])) {
    //     header('location:../index.php');
    // }
    //connecting with database
    include('../../src/fonctions/connect_function.php') ;
    //call function connecting
    $cnx = getConnection() ; 
    // require_once "../db/connexion.php";
    // global $db;
    $results = $cnx->query('SELECT * FROM  questions , reponses  
                    where questions.id=reponses.questions_id ');
    $result= $results->fetchAll();
    shuffle($result);
    //var_dump(count($result));
    //die();

    $_SESSION['question']=[];
    //ou v1 sore ta op seelectionner 
    $_SESSION['score']=0;

    $ok=true;


    $_SESSION['question_total'] = count($result);
    $_SESSION['limites']=5;//5
    // var_dump($nbe_total);
    $_SESSION['nbrquestionparpage']=1;
    //   var_dump( $_SESSION['limite']);
    //   $_SESSION['i']=1;
    if (isset($_POST['suiv'])) {
    
        if ($_SESSION['courantPage']<= $_SESSION['limites']) {
        
            $_SESSION['courantPage']++;
        } 
    }
    if (isset($_POST['prec'])) {
        if ($_SESSION['courantPage']>1) {
            $_SESSION['courantPage']--;

        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Gamepage </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            background-image: url('../../asset/IMG/image1.jpg');
            background-size: cover ;
            height: 10%;
        }
     
         #scrollZone {
          max-height: 440px;
         overflow: scroll;
         } 
     
    </style>
    <!-- bootstrap local -->
    <link rel="stylesheet" href="../../asset/CSS/bootstrap.css">
  </head>
  <body>
    <div class="container-fluid ">
        <!-- header -->
          <div class="row light bg-dark p-2 justify-content-center">
              <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="text-center text-secondary">
                    <h2>TEST YOUR EXPERTISE WITH HAPPY</h2>
                </div>   
              </div>   
          </div>
        <!-- end_header  -->
 
            <!--center-->
            <div class="row justify-content-between"> 
                 <!-- col for game -->
                <div class="col-lg-7 col-md-7 m-md-0 mt-md-5 col-sm-12 col-12 m-lg-5 m-sm-0 " role=" " style=" "> 
                    
                    <div class="modal-content " style="background-color: #6890a065 ;margin-right:12px; width:100% ;height: 70vh;" >  
                             <h4 class="text-align-center justify-content-center">GAME</h4>
                              <h4>QUESTIONS</h4>

                         <input type="hidden" name="user_id" id="user_id" value="<?=$idjueur?>" class="form-control" />

                         <?php
                             $_SESSION['debut'] =  ($_SESSION['courantPage'] -1) *  $_SESSION['nbrquestionparpage'];
                             $pagination = ''; 
                                  // $_SESSION['cpt'];
                             for ($i = $_SESSION['debut']; $i < $_SESSION['courantPage']  && $i <$_SESSION['question_total'];  $i++) {


                                 if ($result[$i]['type'] == 'many choices') {
                                      echo   ' <h1 style="text-align:center;  background-color:rgb(145, 141, 141); " > ';
                                      echo "QUESTION ".$i.'/'.$_SESSION['limites']."<br>";

                                          echo $result[$i]['question'] ;
                                          echo   ' </h1>';

                                          for ($j = 0; $j <=($result[$i]['reponse']); $j++) {
                                            
                                              echo   ' </h3>';
                                              echo   ' <input type="checkbox" name="rep" style="margin-left: 30px"> ';
                                              echo $result[$i]['reponse'][$j];
                                              echo   ' </h3>';
                                              echo   ' </BR>';
                                          } if (isset($_POST['suiv']) && (!empty($_POST['rep']))) {
                                              // unset($_POST['sub']);
                                              $rep=$_POST['rep'];
                                              var_dump($rep);
                                          }
                                      } elseif ($result[$i]['type'] == 'one choice') {
                                          echo   ' <h1 style="text-align:center;  background-color:rgb(145, 141, 141);" > ';
                                          echo "QUESTION ".$i.'/'.$_SESSION['limites']."<br>";

                                          echo $result[$i]['question'];
                                          echo   ' </h1>';
                                          echo '<br>';
                                          for ($j = 0; $j <=($result[$i]['reponse']); $j++) {
                                              echo   ' </h3>';
                                              echo   ' <input type="radio" name="rep" style="margin-left: 30px" > ';
                                              echo $result[$i]['reponse'][$j];
                                              echo   ' </h3>';
                                              echo   ' </BR>';

                                          }
                                          if (isset($_POST['suiv']) && (!empty($_POST['rep']))) {
                                              // unset($_POST['suiv']);
                                              $rep=$_POST['rep'];
                                              var_dump($rep);
                                          }
                                      } elseif ($result[$i]['type'] == 'choice text') {
                                          echo   ' <h1 style="text-align:center;  background-color:rgb(145, 141, 141); " > ';
                                          echo "QUESTION ".$i.'/'.$_SESSION['limites']."<br>";

                                          echo $result[$i]['question'];
                                          echo   ' </h1>';
                                          echo '<br>';
                                          echo ' <textarea type="hidden" name="rep" id=""  cols="40" rows="4" style="margin-left: 30px">';
                                          // echo $jsons[$i]['Varais'];
                                          echo '</textarea>';
                                      } if (isset($_POST['suiv']) && (!empty($_POST['rep']))) {
                                          // unset($_POST['suiv']);
                                          $rep=$_POST['rep'];
                                          var_dump($rep);
                                      }
                             }

                         ?> 

                    </div>
                  
                </div>
                 
                <!-- col for table  -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="modal-content " style="margin:12% 0px; width:100% ;height: 70vh;" id="scrollZone">  
                        
                        <div id="result" class="table-responsive"> <!-- Data will load under this tag!-->
                              
                        </div>   
                        <div> <button class="btn btn-outline-warning mt-5 self-items-left" name="logout"> LOG OUT </button> </div> 
                    </div>
                </div>
            </div>
            <!--center-->

        <!-- footer -->
        <div class="row light bg-dark p-4 "  style="align-items: center;"> </div> 
        <!-- Endfooter -->
       
    </div> 

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../asset/JS/bootstrap.js"></script> 
    <!-- bootstrap local -->
    <link rel="stylesheet" href="../../asset/JS/bootstrap.js">
  </body>
</html>

<script>
 
    $(document).ready(function(){
       
        fetchUser(); //This function will load all data on web page when page load
        function fetchUser() // This function will fetch data from table and display under <div id="result">
        {
            var action = "Load";
            $.ajax({
                url : "sendlistejoueur.php", //Request send to "action.php page"
                method:"POST", //Using of Post method for send data
                data:{action:action}, //action variable data has been send to server
                success:function(data){
                $('#result').html(data); //It will display data under div tag with id result
                }
            });
        }
      
        //This JQuery code will Reset value of Modal item when modal will load for create new records
        $('#modal_button').click(function(){
        $('#customerModal').modal('show'); //It will load modal on web page
        $('#first_name').val(''); //This will clear Modal first name textbox
        $('#last_name').val(''); //This will clear Modal last name textbox
        $('.modal-title').text("Create New Records"); //It will change Modal title to Create new Records
        $('#action').val('Create'); //This will reset Button value ot Create
        });
      
        //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
        $('#action').click(function(){
            var firstName = $('#first_name').val(); //Get the value of first name textbox.
            var lastName = $('#last_name').val(); //Get the value of last name textbox
            var id = $('#customer_id').val();  //Get the value of hidden field customer id
            var action = $('#action').val();  //Get the value of Modal Action button and stored into action variable
            if(firstName != '' && lastName != '') //This condition will check both variable has some value
            {
                $.ajax({
                    url : "sendlistejoueur.php",    //Request send to "action.php page"
                    method:"POST",     //Using of Post method for send data
                    data:{firstName:firstName, lastName:lastName, id:id, action:action}, //Send data to server
                    success:function(data){
                        alert(data);    //It will pop up which data it was received from server side
                        $('#customerModal').modal('hide'); //It will hide Customer Modal from webpage.
                        fetchUser();    // Fetch User function has been called and it will load data under divison tag with id result
                    }
                });
            }
            else
            {
              alert("Both Fields are Required"); //If both or any one of the variable has no value them it will display this message
            }
        });
      
      //   //This JQuery code is for Update customer data. If we have click on any customer row update button then this code will execute
      //   $(document).on('click', '.update', function(){
      //    var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      //    var action = "Select";   //We have define action variable value is equal to select
      //    $.ajax({
      //     url:"action.php",   //Request send to "action.php page"
      //     method:"POST",    //Using of Post method for send data
      //     data:{id:id, action:action},//Send data to server
      //     dataType:"json",   //Here we have define json data type, so server will send data in json format.
      //     success:function(data){
      //      $('#customerModal').modal('show');   //It will display modal on webpage
      //      $('.modal-title').text("Update Records"); //This code will change this class text to Update records
      //      $('#action').val("Update");     //This code will change Button value to Update
      //      $('#customer_id').val(id);     //It will define value of id variable to this customer id hidden field
      //      $('#first_name').val(data.first_name);  //It will assign value to modal first name texbox
      //      $('#last_name').val(data.last_name);  //It will assign value of modal last name textbox
      //     }
      //    });
      //   });
      
      //   //This JQuery code is for Delete customer data. If we have click on any customer row delete button then this code will execute
      //   $(document).on('click', '.delete', function(){
      //    var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      //    if(confirm("Are you sure you want to remove this data?")) //Confim Box if OK then
      //    {
      //     var action = "Delete"; //Define action variable value Delete
      //     $.ajax({
      //      url:"action.php",    //Request send to "action.php page"
      //      method:"POST",     //Using of Post method for send data
      //      data:{id:id, action:action}, //Data send to server from ajax method
      //      success:function(data)
      //      {
      //       fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
      //       alert(data);    //It will pop up which data it was received from server side
      //      }
      //     })
      //    }
      //    else  //Confim Box if cancel then 
      //    {
      //     return false; //No action will perform
      //    }
      //   });
   });
   
    
</script>