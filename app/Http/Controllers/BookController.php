<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
	
	
	public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
        $this->middleware('admin')->only(['destroy']);;
    }
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bks = Book::all();
		foreach($bks as $b){
			$b->eflag = false;
			$b->dflag = false;
			if (Auth::check()){
				if(Auth::user()->role == 'admin'){
					$b->eflag = true;
					$b->dflag = true;
				}
				elseif(Auth::user()->id == $b->creator_id){
					$b->eflag = true;
				}
			}
		}
		return view('book.index',['bks' => $bks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'title' => 'required|string|max:255',
			'pubyear' => 'required|int|min:0|max:2022',
			'cover' => 'required|mimes:jpg,bmp,png|max:2048'
		]);
		
		
		$coverfile = $request->file('cover');
		$coverfilename = $coverfile->getClientOriginalName();
		$extension = $coverfile->extension();
		$newcoverfilename = sha1(time().'_'.rand(1000000000,1999999999).'_'.rand(1000000000,1999999999).'_'.$coverfilename);
		$newcoverfilename = $newcoverfilename.'.'.$extension;

		Storage::disk('local')->putFileAs(
			'public/files',
			$coverfile,
			$newcoverfilename
		);
		
			
        Book::Create(["title" =>$request->title ,"publication-year"=>$request->pubyear, 'cover_file_name'=> $newcoverfilename, 'original_cover_file_name'=>$coverfilename]);
		return redirect()->action([BookController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
		$book->load('authors');
		$url = Storage::url('public/files/'.$book->cover_file_name); 
        return view('book.show',['book' => $book,'cover_url'=>$url ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
		if (! Gate::allows('update_book', $book)) {
            abort(403);
        }
		$all_authors = Author::all();
		$book->load('authors');
        return view('book.edit',['book' => $book, 'all_authors' => $all_authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
			'title' => 'required|string|max:255',
			'pubyear' => 'required|int|min:0|max:2022',
		]);
		if (! Gate::allows('update_book', $book)) {
            abort(403);
        }
		$book->Update(["title" =>$request->title ,"","publication-year"=>$request->pubyear ]);
		$url = Storage::url('public/files/'.$book->cover_file_name); 
        return view('book.show',['book' => $book,'cover_url'=>$url ]);
    }


	/**
     * Remove the specified author from book's authors.
     *
     * @param  \App\Models\Book  $book
     * @param  int  $author
     * @return \Illuminate\Http\Response
     */
    public function removeAuthor(Request $request, Book $book, $author)
	{
		$book->authors()->detach($author);
		return back()->withInput();
	}
	
	/**
     * Insert an author to book's authors.
     *
     * @param  \App\Models\Book  $book
     * @param  int  $author
     * @return \Illuminate\Http\Response
     */
    public function addAuthor(Request $request, Book $book)
	{
		$author = $request->author;
		$count = Book::where('id',$book->id)->whereHas('authors', function (Builder $query) use ($author) {$query-> where('authors.id', $author);})->count();
		if($count == 0)
			$book->authors()->attach($author);
		return back()->withInput();
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
		return redirect()->back();
    }
}
