<?php

include 'header.php';
include 'footer.php';
include 'movieConstructor.php';
include_once 'dbconn.php';
include_once 'films.php';

try {

    $movie = new MovieConstructor($_GET['title'], $_GET['description'], $_GET['release_year'], $_GET['length'], $_GET['replacement_cost'], $_GET['rating'], $_GET['special_features'], $_GET['language_name'], $_GET['rental_date'], $_GET['return_date'], $_GET['amount']);
    $prepared = new Preparer(mysqli_stmt_init($conn), $conn);

    $insertedMovie = $movie->getObject();

    $prepared->conn->set_charset("utf8");

    
    $title = $insertedMovie->name;
    $deescription = $insertedMovie->description;
    (int)$release_year = $insertedMovie->release_year;
    (int)$leength = $insertedMovie->length;
    (float)$replacement_cost = $insertedMovie->replacement_cost;
    $rating = $insertedMovie->rating;
    $special_features = $insertedMovie->special_features;
    $language_name = $insertedMovie->language_name;
    $rental_date = $insertedMovie->rental_date;
    $return_date = $insertedMovie->return_date;
    (float)$amount = $insertedMovie->amount;
    

    $stmt = $prepared->getObject();
    
    if ($stmt){
        $insertQuery = "INSERT INTO film (title, description, release_year, length, replacement_cost, rating, special_features) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertQueryLang = "INSERT INTO languages (name) VALUES (?)";
        $rentalDate = "INSERT INTO rental (rental_date, return_date) VALUES (?, ?, ?)";
        $paymentTbl = "INSERT INTO payment (amount) VALUES (?)";

        $flip = true;
        $query_disable_fk = "SET FOREIGN_KEY_CHECKS=0";

        if ($flip && $stmt->prepare($query_disable_fk)) {

            $stmt->execute();
            $flip = false;
            echo "Prepared statement initialized and executed.";
        } 
        if ($stmt->prepare($insertQuery)) {
            
            $stmt->bind_param("ssiiiss", $title, $deescription, $release_year, $leength, $replacement_cost, $rating, $special_features);
            $stmt->execute();
            echo "Prepared statement initialized and executed.";

        } 
        /*if ($stmt->prepare($insertQueryLang)) {
            
            $stmt->bind_param("s", $language_name);
            $stmt->execute();
            echo "Prepared statement initialized and executed.";

        }
        if ($stmt->prepare($insertDate)) {
            
            $stmt->bind_param("ss", $rentalDate, $return_date);
            $stmt->execute();
            echo "Prepared statement initialized and executed.";

        }
        if ($stmt->prepare($paymentTbl)) {
            
            $stmt->bind_param("f", $amount);
            $stmt->execute();
            echo "Prepared statement initialized and executed.";

        }*/
        else {
            echo "Error: Statement preparation failed.";
        }
    } 

} catch (Throwable $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}

?>