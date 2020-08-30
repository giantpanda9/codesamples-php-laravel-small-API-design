<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookshelf extends Model
{
    //
     private $books = array();
     public function __construct() {
          $this->books = array (
               "Frank Herbert" => array(
                    "Dune",
                    "Dune Messiah",
                    "Children of Dune",
                    "God Emperor of Dune",
                    "Heretics of Dune",
                    "Chapterhouse Dune"
               ),
               "Brian Herbert Kevin J. Anderson" => array(
                    "Dune: House Atreides ",
                    "Dune: House Harkonnen ",
                    "Dune: The Butlerian Jihad ",
                    "Dune: The Machine Crusade ",
                    "Dune: The Battle of Corrin ",
                    "Hunters of Dune",
                    "Sandworms of Dune"
               ),
               "William Olaf Stapledon" => array(
                    "Star Maker",
                    "Last and First Man",
                    "Odd John"
               )
          );
     }

      public function getAll() {
           return $this->books;
      }

     public function getByAuthor($authorName) {
         $returned = array();
         $thisBooks = $this->books;
         foreach ($thisBooks as $key => $value) {
              $temp = array();
              if (strpos($key,$authorName) !== FALSE) {
                   $temp[$key] = $value;
                   array_push($returned, $temp);
              }
         }
         return $returned;
     }
}
