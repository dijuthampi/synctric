<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $libraries = Library::get();
        return view("addBook",compact("libraries"));
    }
    public function add(Request $request)
    {
        $book = Book::create([
            "name" => $request->name,
            "status" => "In"
        ]);
        $book->libraries()->attach($request->libraries);
        return redirect("libraries");
    }
}
