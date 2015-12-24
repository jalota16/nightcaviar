<?php
include_once("pdo_mysql.php");
     $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="NC_users";
	
    $server = pdo_connect($host, $username, $password);
    $connection = pdo_select_db($database, $server);
    //$datasetsLabels= ["Friday", "Saturday", "Sunday"];
    $whichDay = htmlspecialchars($_GET["mobile"]);
    //$whichDay = array_search($whichDay,array_values($datasetsLabels));
    $inputMobile = htmlspecialchars($_GET["mobile"]);
    $myquery = "select name from user_emails where mobile = '".$inputMobile."';";

    $query = pdo_query($myquery);
    
    if ( ! $query ) {
        echo pdo_error();
        die;
    }
    
    $data = array();
    
    for ($x = 0; $x < pdo_num_rows($query); $x++) {
        $result = pdo_fetch_assoc($query);
        $data[] = $result;
    }
    
    unset($server);
    echo json_encode($data);     
?>