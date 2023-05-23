<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Book;
class LibraryController extends Controller
{
    public function index(){
        $libraries = Library::withCount('books')->get();
        return view('libraries',compact("libraries"));
    }
    public function libraryBooks(Request $request){
        $library = $request->library;
        $books = Library::with(["books" => function($q) use($request){
            $q->with(["lentbooks" => function($qq) use($request){
                $qq->orderBy("return_date","DESC");
            }]);
        }])->where("id",$library)->get()->first();
        return view('library',compact("books"));
    }
}
