 <?php
 session_start() ;
  if(isset($_POST['logout'])){
    header('location:../../index.php') ;
  } 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Items</title>
    <!-- Required meta tags -->  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
         #scrollZone{
            max-height: 350px;
           overflow: scroll;
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
        .cercle{
          background-image: url('../../asset/IMG/images/avatar.jpg');
          width: 180px;
          height: 180px;
          position: relative;
          margin-top:15%;
          margin-left:80px;
          border-radius: 130px;
          border: 2px solid black;
        }
     
     </style>
  </head>
  <body>
     <?php
       include('commun_admin.php') ;
     ?>

       <div class="container-fluid ">
            <form action="" method="post">

                <div class="row m-lg-5 m-md-5 m-sm-2 m-2 bg-dark">
                    <div class="col-lg-4 col-md-4 col-sm-10 col-9 m-4  bg-light " style="height:55vh">
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
                    
                    <div class="col-lg-7 col-md-6 col-sm-10  col-9 m-4 bg-light"  id="scrollZone">
                         
                                 <div align="right">
                                  <!-- <button type="button" id="modal_button" class="btn btn-info">Create Records</button> -->
                                    <!-- It will show Modal for Create new Records !-->
                                </div>
                                
                                <div id="result" class="table-responsive"> <!-- Data will load under this tag!-->
                                <?php
 
 include('../../src/fonctions/connect_function.php') ;
  $cnx = getConnection() ;
$quest=array();
$rep =$cnx->prepare("SELECT id, type,question FROM questions");
$rep->execute(); 
while ($all = $rep->fetch()) {
	$quest[]=$all;
}
$reponse=array();
$rep =$cnx->prepare("SELECT id,reponse,etat,questions_id FROM reponses");
$rep->execute();
while ($all = $rep->fetch()) {
	$reponse[]=$all;
}
for ($i=0; $i < count($quest); $i++) { 
	echo $quest[$i]['question'];
	echo "<br>";
	if ($quest[$i]['type']=="choice text") {
		for ($j=$i; $j < count($reponse); $j++) { 
            if ($quest[$i]['id']==$reponse[$j]['questions_id']) 
            {
                echo '<input type="text" value="'.$reponse[$j]['reponse'].'">';
                echo "**************";
			}
		}
		echo "<br>";
	}else if($quest[$i]['type']=="one choice"){
		for ($j=$i; $j < count($reponse); $j++) { 
			if ($quest[$i]['id']==$reponse[$j]['questions_id']) {
				echo $reponse[$j]['reponse'];
				if($reponse[$j]['etat']==1){
					echo '<input type="radio" style="width:0px;height:0px;" checked="checked">';
				}else{
					echo '<input type="radio" style="width:0px;height:0px">';
				}
				
				echo "<br>";
			}
		}
		echo "**************";
		echo "<br>";
	}else if($quest[$i]['type']=="many choices"){
		for ($j=$i; $j < count($reponse); $j++) { 
			if ($quest[$i]['id']==$reponse[$j]['questions_id']) {
				echo $reponse[$j]['reponse'];
				if($reponse[$j]['etat']==1){
					echo '<input type="checkbox" style="width:0px;height:0px" checked="checked">' ;
				}else{
					echo '<input type="checkbox" style="width:0px;height:0px">';
				}
				
				echo "<br>";
			}

		}
		echo "**************";
		echo "<br>";
	}
	
}
?>
                                    
                                </div>
                          <div> <button class="btn btn-outline-warning mt-5 self-items-left" name="logout"> LOG OUT </button> </div> 
                     
                    </div>

                </div>

            </form>    
       </div>
 
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../../asset/JS/bootstrap.js"></script>
         
     </body>
</html>

  <!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
<div id="customerModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Create New Records</h4>
   </div>
   <div class="modal-body">
    <label>Enter First Name</label>
    <input type="text" name="first_name" id="first_name" class="form-control" />
    <br />
    <label>Enter Last Name</label>
    <input type="text" name="last_name" id="last_name" class="form-control" />
    <br />
   </div>
   <div class="modal-footer">
    <input type="hidden" name="customer_id" id="customer_id" />
    <input type="submit" name="action" id="action" class="btn btn-success" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

 