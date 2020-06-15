<?php
//Database connection by using PHP PDO
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=quizz.data', $username, $password ); // Create Object of PDO class by connecting to Mysql database

if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
    //For Load All Data
    if($_POST["action"] == "Load") 
    {
            $statement = $connection->prepare("SELECT * FROM user , score WHERE user.id = score.id_user ORDER BY score.scores  DESC");
            $statement->execute();
            $result = $statement->fetchAll();
            $output = '';
            $output .= '
            <table class="table table-bordered">
                <tr> 
                    <th width="20%">First Name</th>
                    <th width="20%">Last Name </th> 
                    <th width="20%">SCORE</th>
                </tr>
            ';
            if($statement->rowCount() > 0)
            { 
                    foreach($result as $row)
                    {
                            $output .= '
                            <tr>            
                                <td>'.$row["nom"].'</td>
                                <td>'.$row["prenon"].'</td>
                                <td>'.$row["scores"].'</td>
                            </tr>
                            ';
                    }
            }
            else
            {
                    $output .= '
                        <tr>
                        <td align="center">Data not Found</td>
                        </tr>
                    ';
            }
            $output .= '</table>';
            echo $output;
    }
    
}

?>
 