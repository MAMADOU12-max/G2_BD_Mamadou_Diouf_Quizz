<?php
  if(isset($_POST['logout'])){
    header('location:../../index.php') ;
  } 
?> 
<!doctype html>
<html lang="en">
  <head>
    <title>Create_question</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style> 
      
        .select{
          height: 41px;
          border: 2px ,solid , black;
          width: 21vh ; 
          display:flex ; 
          display:inline-table ;
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
            margin-left:50px;
            border-radius: 130px;
            border: 2px solid black;
        }
        
    </style>  

    <!-- bootstrap local -->
     <link rel="stylesheet" href="../../asset/CSS/bootstrap.css">
    <script src="https://kit.fontawesome.com/b6aaa0cf5c.js" crossorigin="anonymous"></script></head>
  <body>
     <?php
        include('commun_admin.php') ;
     ?>
    <form action="" method="post" id="Newform">
       <div class="container-fluid ">
           <div class="row m-lg-5 m-md-5 m-sm-2 m-2 bg-dark">

               <div class="col-lg-3 col-md-4 col-sm-10 col-9 m-3  bg-light " style="height:55vh">
                    <div class="afficher"> 
                        <?php
                            include('photo.php') ;
                        ?>
                          <!--choose maxxx size-->
                          <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
                          <!---input file and code for download image-->                          
                         <input type="hidden" id="form_avatar" class="bouton" class="form-control" 
                          onchange="document.getElementById('photo').src=window.URL.createObjectURL(this.files[0])"> 
                              <!--place i want show photo-->
                          <div class="cercle"> 
                                <img name="img_charge" style="height: 170px; width: 170px; border-radius: 130px;" id="photo" alt="" >
                            
                                <div style="margin-left:96px;" class="error"><?php echo $fill_tof  ;?></div>
                          </div>
                    </div>
               </div>

               <div class="col-lg-4 col-md-6 col-sm-10  col-9 m-3 bg-light" style="height:55vh">
                    <label for="exampleFormControlTextarea1"><strong>WRITE YOUR QUESTION</strong></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="questions"></textarea><br><br>
                    <span class="error_form" id="firstname_error_message">*******</span><br>
                    
                    
                    <label for=""><strong>MARK  
                    <input type="number" id="mark" class="input-form" name="mark" > </strong></label><br><br>   
                    <span class="error_form" id="soumet">*********</span><br><br>
                </div>

               <div class="col-lg-4 col-md-6 col-sm-10 col-9 m-3 bg-light">
                   <!-- submit picture partie select et genere input-->
        
                    <label for=""><strong><h2>Select answer type</h2></strong></label>

                    <div id="inputs" class="Gn">
                        <label for=""><b>select answer type</b></label>            
                        <select style="height: 35px; width: 160px;" placeholder="Donnez le type de réponse" name="choix" id="choix">
                            <option  value="simple">answer with one choice</option>
                            <option value="multiple">many answer choices</option>
                            <option value="texte">text</option>
                        </select>
                        <button type="button" id="btn-first" class="btn-first" onClick="genere()";>+</button>
                    </div> 
                    <button type="button" id="save" class="btn btn-dark">save</button> 
                    <div> <button class="btn btn-outline-warning mt-5 self-items-left" name="logout"> LOG OUT </button> </div>
                  
                </div>
       </div>
    </form>  
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../asset/JS/bootstrap.js"></script>
    <script src="../../asset/JS/generate_inputs.js"></script>
  </body>
</html> 
<script>  
        
     $(document).ready(function(){  
         
     
         
        $("#save").click(function(){ 
          
                // if($('#choix option:selected').val() == 'multiple'){     
                //     var type = "many choices" ;
                // }else if($('#choix option:selected').val() == 'simple'){
                //     var type = "one choice" ;
                // }else if($('#choix option:selected').val() == 'texte'){
                //     var type = "choice text" ;
                // } 
          
                var ask = $('#exampleFormControlTextarea1').val() ;
                var mark = $('#mark').val() ; 
                var choix = $('#choix').val() ; 
                var reponse = $('#Newform').serialize() ; 
 
                // var donnes = 'question='+ask+'&mark='+mark+'&type='+type+'&reponses='+reponse ; 
                         
                    $.ajax( {
                            type : "POST" ,
                            url : "sendQuestion.php" ,
                            data : reponse ,
                            success : function (){

                    
                            
                            console.log(reponse);
                            alert("ok") ;
                        }
                    } );
                        
                  
        })

        
        
     })
        
      
</script>
 
 