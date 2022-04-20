<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<h1 style="color:green;font-size:1.5em "> Edit Book Info: </h1>
					<hr>
					@if ($errors->any())
						<div>
							<ul>
								@foreach ($errors->all() as $error)
									<li style="color:#E74C3C">{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form action="{{route('updateBook',[$book->id])}}" method="post">
						@csrf
						
						Title: <input type="text" name="title" placeholder="Enter title" required value="{{$book->title}}">
						Publication Year: <input type="number" min=0 max=2030 name="pubyear"  placeholder="Enter publication year" required value={{$book->{"publication-year"} }} >
						<button style="background-color: #04AA6D;    color: white;    padding: 10px 15px;    margin: 8px 0;    border: none;    cursor: pointer;    width: 15%;    opacity: 0.8;      font-weight: 600;"> Update </button>
					</form>
					<h3 style="font-size:1.25em;color:#0083b3"> Book Authors: </h3>
					<hr>
					<table>
						@foreach($book->authors as $author)
						<tr>
						<td><a href="{{ route('showAuthor',[$author]) }}" class="underline">  {{$author->fname}} {{$author->lname}}  </a></td>
						<td><a href="{{ route('remAuthor',[$book,$author]) }}" class="underline" style="margin-left: 10px;color:#E74C3C" onclick="return confirm('Are you sure you want to remove author?')">   remove! </a></td>
						</tr>
						@endforeach
					</table>
					<form action="{{route('addAuthorToBook',[$book->id])}}" method="post">
						@csrf
						Add Author: 	
						<select name="author" id="author">
							<option value="" disabled selected>Select Autor</option>
							@foreach($all_authors as $author)
							<option value={{$author->id}}>{{$author->fname}} {{$author->lname}}</option>						
							@endforeach										
						</select>												
						<button style="background-color: #04AA6D;    color: white;    padding: 10px 15px;    margin: 8px 0;    border: none;    cursor: pointer;    width: 15%;    opacity: 0.8;      font-weight: 600;"> Add </button>
					</form>
					<hr>
					<a href="{{ route('booksIndex') }}" class="underline">  بازگشت  </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
