<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bookshelf;

class booksearch extends Controller
{
    //
     public function getBooks() {
          $bookShelf = new bookshelf;
          $returned = $bookShelf->getAll();
          return response()->json($returned, 200);
     }
     public function getBooksByAuthor($authorName) {
          $bookShelf = new bookshelf; 
          $returned = $bookShelf->getByAuthor($authorName);
          return response()->json($returned, 200);
     }
}
