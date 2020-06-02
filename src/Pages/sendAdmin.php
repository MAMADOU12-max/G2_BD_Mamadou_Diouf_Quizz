 
<?php 
    include('../../src/fonctions/connect_function.php') ;
    if($_POST){
        $firstname = $_POST['nom']; 
        $lastname = $_POST['prenom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        

        $cnx = getConnection() ;

        $sql = "INSERT INTO `user` VALUES (null,'".$login."','".$lastname."','".$firstname."','".$password."',null,'admin')";
        $query = $cnx->prepare($sql);
        $query->execute(); 

        
        // $contenu = file_get_contents("json.json");
        // $contenu = json_decode($contenu,true);
        // $contenu[] = ['nom'=> $firstname,'prenom'=> $lastname,'email'=>$login,'mot de passe'=> $password ];
        // $contenu = json_encode($contenu);
        // file_put_contents('json.json',$contenu);*
        
    } 

?>