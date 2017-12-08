<!--Test file to check array contents-->

<?php
// ERROR DISPLAY - ****REMOVE LATER***
ini_set('display_errors', 'On'); 
ini_set('html_errors', 0); 
error_reporting(-1);

require_once "include/db_config.php";

//Select statement to retrieve required data
    $sql = "SELECT ID, username FROM users";

//Prepare the select statement.
    $stmt = $mysqli->prepare($sql);

//Execute the statement.
    $stmt->execute();
   
// Pull result set
    $result = $stmt->get_result();

//Retrieve the rows using fetch_all
    $users = $result->fetch_all();
//    
//    print_r(array_values($users));
    
    echo json_encode($users);
    ?>  
