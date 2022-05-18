<?php

namespace App\Http\Controllers\Api;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Book;
use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
	function getAllBooks()
	{
		$books = Book::all();
		return response()->json($books);
	}
	
    public function store(Request $request)
    {
		$request->validate([
			'title' => 'required|string|max:255',
			'pubyear' => 'required|int|min:0|max:2022',
		]);
		
        $book = Book::Create(["title" =>$request->title ,"publication-year"=>$request->pubyear]);
		return response()->json($book);
	}
    public function show(Request $request)
    {
		$book = Book::find($request->id);
		return response()->json($book->load('authors'));
    }
	
	
}
