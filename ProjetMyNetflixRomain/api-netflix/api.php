<?php 
header('Access-Control-Allow-Origin: *');
require_once('includes/dbConn.php');

if(!empty($_REQUEST)) {
    $data = isset($_REQUEST['data']) ? $_REQUEST['data'] : 0;
    $SQLQuery = '';
    if($data == 'series') {
        $SQLQuery = 'SELECT * FROM serie';
    } else if ($data == 'saisons') {
        $ids = isset($_REQUEST['idserie']) ? $_REQUEST['idserie'] : 0;
        $SQLQuery = "SELECT * FROM saison WHERE idserie = :idserie";
        $SQLStmt = $dbh->prepare($SQLQuery);
        $SQLStmt->bindValue(':idserie', $ids);

    } else if ($data == 'episodes') {
        $ids = isset($_REQUEST['idsaison']) ? $_REQUEST['idsaison'] : 0;
        $SQLQuery = "SELECT * FROM episode WHERE idsaison = :idsaison";
        $SQLStmt = $dbh->prepare($SQLQuery);
        $SQLStmt->bindValue(':idsaison', $ids);
    }

    if(!isset($SQLStmt)) {
        $SQLStmt = $dbh->prepare($SQLQuery);
    }
            
    $SQLStmt->execute();

    if($SQLStmt->rowCount() == 0) {
        header('Content-Type:text/html; charset=utf-8');
        print('Aucun enregistrement ne correspond à la demande');
    }
    else {
        header('Content-Type:application/json; charset=utf-8');
        print(json_encode($SQLStmt->fetchAll(PDO::FETCH_ASSOC)));
    }
    
    $SQLStmt->closeCursor();

    
} else {
    header('Content-Type:text/html; charset=utf-8');
    print("Erreur de paramètre");
}

?>
