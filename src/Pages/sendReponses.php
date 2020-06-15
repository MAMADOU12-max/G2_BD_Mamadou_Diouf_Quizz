  
<?php 
    include('../../src/fonctions/connect_function.php') ;
    if($_POST){
        
        $reponse = $_POST['reponses'];

       
        $cnx = getConnection() ;

        $sql = "INSERT INTO `questions` VALUES (null,'".$ask."','".$type."','".$mark."' )";
      
        $query = $cnx->prepare($sql);
        $query->execute(); 

         
 
    } 

?>