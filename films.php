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
        <select name="genreOption" id="genre" ">
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
            <form class="form" action="films.php" method="get">

                <input type="text" id="genre" name="genre" placeholder="Genre">
                <input type="text" id="genre" name="genre" placeholder="Genre">
                <input type="text" id="genre" name="genre" placeholder="Genre">
                <input type="text" id="genre" name="genre" placeholder="Genre">
                <input type="text" id="genre" name="genre" placeholder="Genre">
                <input type="text" id="genre" name="genre" placeholder="Genre">
                
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
                    echo "<h2>" . $film['title'] . "</h2>" ."<br>";
                    echo "</div>";
                    echo "<br>";
                    
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