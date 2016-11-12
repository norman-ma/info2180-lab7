<?php

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$all = $_GET['all'];
$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if($all=='true'){
     $stmt = $conn->query("SELECT * FROM countries");
     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else if($country != '' && $country != null){
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
    $results = "";
}



echo '<ul>';
if($results!=""){
    foreach ($results as $row) {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
}
echo '</ul>';