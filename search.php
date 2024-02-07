<?php


$search_results = [];

include_once 'dbconn.php';
include_once 'films.php';
//Search::Searcher();

/*class Search extends Preparer {

    public static function  Searcher(){*/
try {


            $prepared = new Preparer(mysqli_stmt_init($conn), $conn);

            $prepared->conn->set_charset("utf8");

                if ($prepared->stmt != null){
                    echo "Prepared statement initialized.";
                } else {
                    die("Prepared statement failed.");
                }

                $stmt = $prepared->getObject();

                if (isset($_POST['title']) && strlen($_POST['title']) > 1) {

                    $title = $_POST['title'];
                    $option = isset($_POST['genreOption']) ? $_POST['genreOption'] : false;
                    if ($option) {
                        
                        //$stmt->prepare("SELECT * FROM film WHERE title LIKE '%$title%'");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                array_push($search_results, $row);
                            }
                        }

                    } 
                    
                    else if (1){
                        $stmt->prepare("SELECT * FROM film WHERE title LIKE '%$title%'");
                        //$stmt->prepare("SELECT film.title, film.description, film.release_year, film.length, film.replacement_cost FROM film WHERE title LIKE '%$title%'");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                               array_push($search_results, $row);
                            }
                        }

                    }
                    else {
                        
                        echo "No results found.";
                    }


                    displayResults($search_results);
                
                }


                else if (isset($_POST['title'])){
                    
                    echo "Search field is empty.";

                    emptyFill();

                }

            } catch (Throwable $e) {
                echo "Error: " . $e;
 }

?>