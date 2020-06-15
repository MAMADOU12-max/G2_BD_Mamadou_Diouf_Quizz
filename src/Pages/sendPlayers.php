<?php
require_once "../../src/fonctions/connect_function.php";
 
    getConnection(); // global means search in ur project or folder or application the value db and bring it here
    //that's (db= new PDO  .....) in connextion.php  , if we don't do it ,each time , this going to be reconnect connection   

    //recup data in ajax with post 
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
    $date = $_POST['date'];


    $sql ="
            SELECT nom,prenom 
            FROM user
            ORDER BY id DESC
            LIMIT {$limit} 
            OFFSET {$offset}
    ";

//     if($date==1){
//         $date = date('Y-m-d');
//         $sql = "
//         SELECT * 
//         FROM vente
//         WHERE date= DATE('{$date}')
//         ORDER BY id DESC
//         LIMIT {$limit} 
//         OFFSET {$offset}
// ";
        
//     }
    $req = $db->query($sql);  
    $result = $req->fetchAll(2);

    //retult result by json 
    echo json_encode($result);

?>