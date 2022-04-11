<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<h2 style="color:green;font-size:1.5em "> Book Information: </h2>
					<hr>
					<table>
					<tr><td style="color:blue;">id:</td><td>{{$book->id}}</td></tr>
					<tr><td style="color:blue;">title:</td><td>{{$book->title}}</td></tr>
					<tr><td style="color:blue;">publication year:</td><td>{{ $book->{"publication-year"} }}</td></tr>
					<tr><td style="color:blue;">created at:</td><td>{{$book->created_at}}</td></tr>
					<tr><td style="color:blue;">last update:</td><td>{{$book->updated_at}}</td></tr>
					</table>
					<hr>
					<a href="{{ route('booksIndex') }}" class="underline">  back  </a>
					<td><a href="{{ route('editBook',[$book->id]) }}" class="underline" style="margin-left: 10px;" > edit </a></td>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
