 
<?php 
    include('../../src/fonctions/connect_function.php') ;
    if($_POST){
        $firstname = $_POST['nom']; 
        $lastname = $_POST['prenom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        

        $cnx = getConnection() ;

        $sql = "INSERT INTO `user` VALUES (null,'".$login."','".$lastname."','".$firstname."','".$password."','".$avatar."','joueur')";
        $query = $cnx->prepare($sql);
        $query->execute(); 

         
 
    } 

?>