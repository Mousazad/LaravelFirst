<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Hello</title>
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
		  <p>Hello! It is my first Laravel project!</p>
		 
		</div>

	</body>
</html>