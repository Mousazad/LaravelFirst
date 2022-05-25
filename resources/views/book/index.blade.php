@extends('layouts.hello_layout')
@section('onvan', 'Books')
@section('mohtava')
<style>
a.disabled {
  pointer-events: none;
  cursor: default !important;
  text-decoration: none !important;
  color: #7F8C8D !important;
}
</style>
	<div class="p-6 bg-white border-b border-gray-200">
		<h1 > It is list of all books: </h1>
		<hr>
		<table>
		@foreach($bks as $b)
		<tr>
			<td><a href="{{ route('showBook',[$b]) }}" class="underline">  {{$b->title}}  </a></td>
			<td><a href="{{ route('delBook',[$b]) }}" @if(!$b->dflag) class="disabled" @else class="underline" @endif style="margin-left: 10px;color:#E74C3C" onclick="return confirm('Are you sure you want to delete?')">   del it! </a></td>
			<td><a href="{{ route('editBook',[$b]) }}" @if(!$b->eflag) class="disabled" @else class="underline" @endif style="margin-left: 10px;color:#0083b3" >   edit </a></td>
		</tr>
		@endforeach
		</table>
	</div>

	<hr>
	<div class="p-6 bg-white border-b border-gray-200">
		<h1  "> Add a new book: </h1>
		@if ($errors->any())
			<div>
				<ul>
					@foreach ($errors->all() as $error)
						<li style="color:#E74C3C">{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{route('storeBook')}}" method="post" enctype="multipart/form-data" >
			@csrf
			<div class="container-fluid ">
				<div class="row">
					<div class="col-lg-2 col-md-2 mt-3 "> Title: </div>
					<div class="col-lg-4 col-md-4  mt-3"> <input  class="form-control" type="text" name="title" placeholder="Enter title" required></div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-2 mt-3 "> Publication Year: </div>
					<div class="col-lg-2 col-md-2  mt-3"> <input class="form-control" type="number" min=0 max=2030 name="pubyear"  placeholder="Enter publication year" required ></div>
				</div>
			
			
				<div class="row">
					<div class="col-lg-2 col-md-2 mt-3 "> Cover file: </div>
					<div class="col-lg-3 col-md-3  mt-3"> <input class="form-control" type="file" name="cover" id="cover"> </div>
				</div>
			
		
				<div class="col-lg-2 col-md-2"> <button type="submit" class="btn btn-success"> Add </button></div>
			</div>
		</form>
	</div>			
@endsection

