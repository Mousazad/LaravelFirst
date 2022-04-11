<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<h1 style="color:green;font-size:1.5em "> It is list of all authors: </h1>
					<hr>
					<table>
					@foreach($authors as $a)
					<tr>
					<td><a href="{{ route('showAuthor',[$a]) }}" class="underline">  {{$a->fname}} {{$a->lname}}  </a></td>
					<td><a href="{{ route('delAuthor',[$a]) }}" class="underline" style="margin-left: 10px;color:#E74C3C" onclick="return confirm('Are you sure you want to delete?')">   del it! </a></td>
					<td><a href="{{ route('editAuthor',[$a]) }}" class="underline" style="margin-left: 10px;color:#0083b3" >   edit </a></td>
					</tr>
					@endforeach
					</table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<h1 style="color:green;font-size:1.5em "> Add a new author: </h1>
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
					<form action="{{route('storeAuthor')}}" method="post">
						@csrf
						
						<p style="margin-top:10px;">code: <input style="margin-left:50px;  border-radius: .5em;" type="text" name="code" placeholder="Enter code" required></p>
						<p style="margin-top:10px;">First name: <input style="margin-left:10px;  border-radius: .5em;" type="text" name="fname" placeholder="Enter first name" required></p>
						<p style="margin-top:10px;">Last name: <input style="margin-left:10px;  border-radius: .5em;" type="text" name="lname" placeholder="Enter last name" required></p>
						<p style="margin-top:10px;"><button style="background-color: #04AA6D;    color: white;    padding: 10px 15px;    margin: 8px 0;    border: none;   border-radius: .5em; cursor: pointer;    width: 15%;    opacity: 0.8;      font-weight: 600;"> Add </button></p>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
