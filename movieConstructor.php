<?php

class MovieConstructor {
    
    public $name; 
    public $description; 
    public $release_year; 
    public $length; 
    public $replacement_cost; 
    public $rating; 
    public $special_features; 
    public $language_name; 
    public $rental_date; 
    public $return_date; 
    public $amount; 
    //SELECT title, description, release_year FROM film;
    /*SELECT film.title, film.description, film.release_year, film.length, film.replacement_cost, language.name AS language_name, rental.rental_date, rental.return_date, payment.amount FROM film INNER JOIN language ON film.language_id = language.language_id INNER JOIN inventory ON film.film_id = inventory.film_id INNER JOIN rental ON inventory.inventory_id = rental.inventory_id INNER JOIN payment ON rental.rental_id = payment.rental_id;*/


    public function __construct($name, $description, $release_year, $length, $replacement_cost, $rating, $special_features, $language_name, $rental_date, $return_date, $amount) {

        $this->name = $name;
        $this->description = $description;
        $this->release_year = $release_year;
        $this->length = $length;
        $this->replacement_cost = $replacement_cost;
        $this->rating = $rating;
        $this->special_features = $special_features;
        $this->language_name = $language_name;
        $this->rental_date = $rental_date;
        $this->return_date = $return_date;
        $this->amount = $amount;

        
    }

    public function getObject() {
        
        
        return $this; 

    }

}

?>