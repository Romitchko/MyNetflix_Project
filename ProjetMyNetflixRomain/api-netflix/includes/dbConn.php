<?php 

$user = 'root';
$pass = '';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=mynetflix', $user, $pass);
} 
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
