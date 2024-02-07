<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
</head>
<?php
    include 'header.php';
    include_once 'dbconn.php';
    include_once 'search.php';
    include 'footer.php';
?>
<body>
    <div class="filmsearch_container">
    <div class="searchInput">
        <form action="search.php" method="post">
            <input type="text" id="title" name="title" placeholder="Search for films">
            <button id="search_button" type="submit">Search</button>
        </form>
       
    <div class="filterGenre">

        <label for="genres">Filter results by genre:</label>
        <form action="search.php" method="post">
        <select name="genreOption" id="genre" onchange="<?php  ?>">
            <?php

                echo "<option value='1'>Action</option>";
                echo "<option value='2'>Animation</option>";
                echo "<option value='3'>Children</option>";
                echo "<option value='4'>Classics</option>";
                echo "<option value='5'>Comedy</option>";
                echo "<option value='6'>Documentary</option>";
                echo "<option value='7'>Drama</option>";
                echo "<option value='8'>Family</option>";
                echo "<option value='9'>Foreign</option>";
                echo "<option value='10'>Games</option>";
                echo "<option value='11'>Horror</option>";
                echo "<option value='12'>Music</option>";
                echo "<option value='13'>New</option>";
                echo "<option value='14'>Sci-Fi</option>";
                echo "<option value='15'>Sports</option>";
                echo "<option value='16'>Travel</option>";

            ?>
            
        </select>
       
    </form>
    </div>

    </div>
    
    <div class="addForm">
        
        <fieldset class="fieldSet">
            <legend>Add a film to the database:</legend>
            <form class="form" action="insertMovie.php" method="get">

                <input type="text" id="title" name="title" placeholder="Title/name">
                <input type="text" id="description" name="description" placeholder="Description">
                <input type="text" id="release_year" name="release_year" placeholder="Release year(integer)">
                <input type="text" id="length" name="length" placeholder="Film length(mins(integer))">
                <input type="text" id="replacement_cost" name="replacement_cost" placeholder="Replacement cost(float)">
                <input type="text" id="rating" name="rating" placeholder="Age rating">
                <input type="text" id="special_features" name="special_features" placeholder="Special features">
                <input type="text" id="language_name" name="language_name" placeholder="Not in use">
                <input type="text" id="rental_date" name="rental_date" placeholder="Not in use">
                <input type="text" id="return_date" name="return_date" placeholder="Not in use">
                <input type="text" id="amount" name="amount" placeholder="Not in use">

                <button id="search_button" type="submit">Add</button>
            </form>
        </fieldset>
        

    </div>
    
    
    
</body>
<?php

        function displayResults($search_results) {
            
            if ($search_results == null) {

                echo "<div class='contain'>";
                echo "<h2>Elokuvaa ei löytynyt.</h2>";
                echo "</div>";
                
            } else{
                echo "<div class='filmResults'>";
                
                foreach ($search_results as $film) {
                    
                    echo "<div class='film'>";
                    echo "<h2>Title:  " . $film['title'] . "</h2>" ."<br>";
                    echo "<p>Description:  " . $film['description'] . "</p>" ."<br>";
                    echo "<p>Release year:  " . $film['release_year'] . "</p>" ."<br>";
                    echo "<p>Length:  " . $film['length'] . "</p>" ."<br>";
                    echo "<p>Replacement cost:  " . $film['replacement_cost'] . "</p>" ."<br>";
                    echo "<p>Rating:  " . $film['rating'] . "</p>" ."<br>";
                    echo "<p>Special features:  " . $film['special_features'] . "</p>" ."<br>";
                   /*echo "<p>Language:  " . $film['name'] . "</p>" ."<br>";
                    echo "<p>Rental date:  " . $film['rental_date'] . "</p>" ."<br>";
                    echo "<p>Return date:  " . $film['return_date'] . "</p>" ."<br>";
                    echo "<p>Rent cost:  " . $film['amount'] . "</p>" ."<br>";
                
                    echo "</div>";
                    echo "<br>";*/
                    
                }
                echo "</div>";
            }
        }

        function emptyFill() {
            echo "<div class='contain'>";
            echo "<h2>Please enter a search string</h2>";
            echo "</div>";
        }
        
   

    
?>
</html>