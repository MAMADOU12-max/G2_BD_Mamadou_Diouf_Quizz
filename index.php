<?php 
session_start() ;
    try
    {
      // On se connecte à MySQL
      $bdd = new PDO('mysql:host=localhost;dbname=quizz.data', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) ;
    }
    catch(Exception $e)
    {
      // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
    $password_error =  $login_error  = "" ;
    if(isset($_POST['sign_in']) & !empty($_POST['login']) & !empty($_POST['password']) ) {
       $login = $_POST['login'] ;
       $password = $_POST['password'] ;
          
       $reponse = $bdd->query('SELECT * FROM user WHERE adresse_user = "'.$login.'"');
    
       
       //  On affiche chaque entrée une à une
       while ($donnees = $reponse->fetch()){
            if ($login == $donnees['adresse_user'] && $password == $donnees['password'] && $donnees['role'] == "admin") {
                // echo "admin"  ;

                header('location:src/Pages/adminpage.php') ;
            }
            elseif ($login == $donnees['adresse_user'] && $password == $donnees['password'] && $donnees['role'] == "joueur") {
              $_SESSION['courantPage'] = 1 ; 
              header('location:src/Pages/gamepage.php') ;
            }
            elseif ($login == $donnees['adresse_user'] && $password !== $donnees['password'] && $donnees['role'] == "joueur") {
                $password_error  = "your password is not valid" ;
            
            }
            elseif ($login !== $donnees['adresse_user'] && $password == $donnees['password'] && $donnees['role'] == "joueur") {
                $login_error = "your login is not valid" ;
            } 
            elseif ($login !== $donnees['adresse_user'] && $password !== $donnees['password'] ) {
                $login_error = "not corresponding, please data create account if you ain't please " ;
            } 
          
       }

    } elseif(isset($_POST['sign_in']) &  empty($_POST['login']) & !empty($_POST['password']) ){ 
      $login_error = "will you fill a login please!" ;
    }  elseif(isset($_POST['sign_in']) &  !empty($_POST['login']) &  empty($_POST['password']) ){ 
      $password_error = "will you fill a password please!" ;
    }  elseif(isset($_POST['sign_in']) &  empty($_POST['login']) &  empty($_POST['password']) ){ 
      $login_error = "you haven't write anything! put inputs " ;
    } 
      

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Homepage </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            background-image: url('asset/IMG/image1.jpg');
            background-size: cover ;
            height: 10%;
        }
    </style>
    <!-- bootstrap local -->
    <link rel="stylesheet" href="asset/CSS/bootstrap.css">
  </head>
  <body>
    <div class="container-fluid ">
       <!-- header -->
          <div class="row light bg-dark p-2 justify-content-center">
              <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="text-center text-secondary">
                    <h2>HOME PAGE</h2>
                </div>   
              </div>   
          </div>
       <!-- end_header  -->
 
            <!--Modal: Contact form-->
            <div class="modal-dialog cascading-modal " role="document" style="margin-top: 90px;">
          
              <!--Content-->
              <div class="modal-content" style="background-color: #6890a065 ;" >  
          
               
                <!--Body-->
                <div class="modal-body">

                  <!-- formulaire -->
                  <form action="" method="post"> 
                    <!-- Default input name -->
                    <label for="defaultFormNameModalEx">LOGIN</label>
                    <input type="text" id="input1" name="login" id="defaultFormNameModalEx" class="form-control form-control-sm">
                    <span id="login_error" class="text-danger"><?php echo $login_error; ?></span>
                    <br>
            
                    <!-- Default input email -->
                    <label for="defaultFormEmailModalEx">PASSWORD</label>
                    <input type="password" id="input2" name="password" id="defaultFormEmailModalEx" class="form-control form-control-sm">
                    <span id="password_error" class="text-danger"><?php echo  $password_error; ?></span> 
                    <br>
            
                    <div class="text-center mt-4 mb-2 text-align-between">
                      <button type="submit" id="bouton" name="sign_in" class="btn btn-info">SIGN IN</button>
                      <button type="submit" name="create_account" class="btn  ">Create account </button>
                    </div>

                  </form>  
          
                </div> 
              </div>
              <!--/.Content-->
            </div>
            <!--/Modal: Contact form-->

              <!-- footer -->
            <div class="row light bg-dark p-4 "  style="margin-top: 11%;  align-items: center;">
                 
          </div>
          
            <!-- Endfooter -->
       
    </div>    
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- bootstrap.js local -->
    <link rel="stylesheet" href="asset/JS/bootstrap.js">
  </body>
</html>

<script>
 
   // validation au niveau dela page de connexion
        var numb1 = document.getElementById('input1') ;
        var numb2 = document.getElementById('input2') ;
        document.getElementById('bouton').addEventListener('click',function(e){
          
            if ((numb1.value  == "" &&  numb2.value  == "" )) {
                //    alert('you must fill all box')
                e.preventDefault();
                login_error.textContent = "you must fill all box" ;
            }else if(numb1.value  == "" &&  numb2.value  != "" ){
                        e.preventDefault();
                login_error.textContent = "you must give a login" ;
            }else if(numb1.value  != "" &&  numb2.value == "" ){
                        e.preventDefault();
                password_error.textContent = "****lake password****" ;
            }
        
        })
</script>