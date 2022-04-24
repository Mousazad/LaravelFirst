<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Authors</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	
	<body style="height:1500px">

		<nav class="navbar navbar-expand-sm bg-success navbar-dark sticky-top">
		  <div class="container-fluid"> 
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="navbar-brand" href="{{ route('booksIndex') }}" class="underline">  Books  </a>				</li>
				<li class="nav-item">
					<a class="navbar-brand" href="{{ route('authorsIndex') }}" class="underline">  Authors  </a>
				</li>
			</ul>
		  </div>
		</nav>

		<div class="container-fluid"><br>
		   <div class="p-6 bg-white border-b border-gray-200">
				<h1 > It is list of all authors: </h1>
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
				<form action="{{route('storeAuthor')}}" method="post">
					@csrf
					<div class="container-fluid ">
						<div class="row">
							<div class="col-lg-2 col-md-2 mt-3 "> code: </div>
							<div class="col-lg-2 col-md-2  mt-3"> <input  class="form-control" type="text" name="code" placeholder="Enter code" required></div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-md-2 mt-3 "> First name: </div>
							<div class="col-lg-2 col-md-2  mt-3"> <input class="form-control" type="text" min=0 max=2030 name="fname"  placeholder="Enter first name" required ></div>
						</div>									
						<div class="row">
							<div class="col-lg-2 col-md-2 mt-3 "> Last name: </div>
							<div class="col-lg-2 col-md-2  mt-3"> <input class="form-control" type="text" min=0 max=2030 name="lname"  placeholder="Enter last name" required ></div>
						</div>	
						
						<div class="col-lg-2 col-md-2"> <button type="submit" class="btn btn-success"> Add </button></div>
					</div>
				</form>

			</div>			
			
		 
		</div>

	</body>
</html>










