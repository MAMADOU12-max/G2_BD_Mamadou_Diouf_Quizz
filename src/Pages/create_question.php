<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create_question</title>
    <style> 
      body {
            background-image: url('../../asset/IMG/image1.jpg');
            background-size: cover ;
            height: 10%;
        }
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
    </style> 

    <!-- bootstrap local -->
    <link rel="stylesheet" href="../../asset/CSS/bootstrap.css">
    <script src="https://kit.fontawesome.com/b6aaa0cf5c.js" crossorigin="anonymous"></script>

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
                 <div class="row " >
                   <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center"> 

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><strong>WRITE YOUR QUESTION</strong> </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <span class="error_form" id="firstname_error_message">*******</span>  
                        </div> 
                         <span class="error_form" id="firstname_error_message">*******</span><br>  
                        
                         </strong></label>
                         <label for=""><strong>MARK  <input type="number" id=" " class="input-form" name="mark" ><br><br> 
                         <span class="error_form" id="lastname_error_message">*********</span><br><br>
                        
                         <div style=" margin-left: 22%; ">
                           <label for="">Select answer type</label>
                             <table >  
                                <tr>  
                                    <td>    
                                       <select class="select" name="" id="" placeholder="select type">  
                                          <option value="simple">opt1</option> 
                                          <option value="text">opt2</option>
                                          <option value="">opt3</option>
                                       </select>  
                                    </td>  
                                    <td>   
                                       <button class="add" id="add" name="add"><i class="fas fa-plus fa-2x"></i></button> 
                                    </td>   
                                </tr>     
                             </table>
                       </div>       
                    
                   </div>
                   <!-- submit picture -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-5 bg-light">
                        <!-- places inputs generate -->nnnnnnnnnnnnnnnn
                    </div>
                 </div>

               </div>
           </div>
      </div>
   
   </div>
 
    </form> 

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../asset/JS/bootstrap.js"></script>
</body>
</html>

<script>
  $(document).ready(function(){
     var i=0 ;
     $('#add').click(function(){
          if (choix == "simple") {
              alert('simple') ;
          }else if(choix=="text"){
            alert('text')
          }
        
     })

  }) 

</script>
<script src="je mets ici le chemin du dossier"></script>




 