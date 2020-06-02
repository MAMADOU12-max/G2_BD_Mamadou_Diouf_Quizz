<?php
      // function for connect database in the user's table
    function getConnection()
    {
       $host  = "localhost";
       $db_name = "quizz.data";
       $usename = "root";
       $password = "";
       $connection ;
                                                                    
       $connection  = null ;
       try {
           $connection = new PDO('mysql:host='.$host.';dbname='.$db_name,$usename,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       } catch (PDOException $exeption) 
       {
           echo "Erreurr :".$exeption->getMessage() ;
       }

       return $connection ; 
    }
   
?>