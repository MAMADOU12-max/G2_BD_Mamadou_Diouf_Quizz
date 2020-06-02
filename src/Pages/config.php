<?php
    $conn = mysqli_connect("localhost","root","","quizz.data" ) ;
    if (!$conn) {
         echo "db".mysqli_error($conn) ;
    }
?>