 
<?php  
    include('../../src/fonctions/connect_function.php') ;
    $cnx = getConnection() ;
    
    if($_POST){

        $ask = $_POST['questions']; 
        $mark = $_POST['mark'];
        $type = $_POST['choix'];
        $texte_reponse=$_POST["reponseTexte"];
        $reponse_send=[];
        $test1=0;
        $test2=1;
        
        $sql =$cnx->prepare("INSERT INTO `questions` ( `question`, `type`, `point`) VALUES (:questions, :type, :mark)");

        $sql->bindParam('questions',$ask);
        $sql->bindParam('type',$type);
        $sql->bindParam('mark',$mark);

        if($sql->execute()){

            echo "envoie cool";
        }else{
            echo "envoie non cool";
        }

  
        
       
       
     

       

     if($type=="texte"){
        $value=1;
        $va=0;

        $reponse_simple=$cnx->prepare("INSERT INTO `reponses` (`id`, `reponse`, `etat`, `questions_id`) VALUES (NULL, '$texte_reponse', '$va', '$value')");
      
       
        // $reponse_simple->bindValue(':texte_repnse',$texte_reponse);
        // $reponse_simple->bindParam(':optionn',$value);
        // $reponse_simple->bindParam(':valuee',$va);
        if($reponse_simple->execute()){

            echo "cool";
        }else{
            echo "non cool";
        }
        //     $reponse$i =  $_POST['$reponse'] ;  
        //     $sql = "INSERT INTO `reponses` VALUES (null,'".$reponse$i."',null,3)"; 
       
            // foreach($_POST['reponse'] as $k=>$reponse) {
                // $int_ext = $_POST['int_ext'][$k];
                // $scene_desc = $_POST['scene_desc'][$k];
            
            
                    // $sql = "INSERT INTO `reponses` VALUES (null,'".$reponse."',null,3)"; 
                    
                    // $query = $cnx->prepare($sql);
                    // $query->execute(); 

        
            }  

            if($type=="multiple"){
                $value=1;
                $va=0;

           $reponse_envoi=$cnx->prepare("INSERT INTO `reponses` (`reponse`, `etat`, `questions_id`) VALUES (:texte,:bonne,:id_questION)");

                for($i=1;$i<=10;$i++){

                    if(isset($_POST["reponse$i"])){

                        $reponseCheck[]=$_POST["reponse$i"];

                        foreach($reponseCheck as $valeur){

                            $reponse_envoi->bindValue(':texte',$valeur);
                            $reponse_envoi->bindParam(':id_questION',$value);
                            $reponse_envoi->bindParam(':bonne',$value);
                          
            
                        }
                         
                        

                        if( $reponse_envoi->execute()){

                            echo "<h1>Donnees envoyés dans la base</h1>";
                    
                        }else{
                    
                            echo "<h1>Donnees non envoyés dans la base</h1>";
                        }
                                        
                        
                    }

                    
                }

                
            }
        }
          

                            // $query = $cnx->prepare($sql);
                            // $query->execute(); 
                    
                             
                           // $conn ->exec($rep) ;
                           
                        
                    
              // }  
               
 
    

?>