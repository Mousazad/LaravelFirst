<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<h2 style="color:green;font-size:1.5em "> Author Information: </h2>
					<hr>
					<table>
					<tr><td style="color:blue;">id:</td><td>{{$author->id}}</td></tr>
					<tr><td style="color:blue;">code:</td><td>{{$author->code}}</td></tr>
					<tr><td style="color:blue;">first name:</td><td>{{$author->fname}}</td></tr>
					<tr><td style="color:blue;">last name:</td><td>{{$author->lname}}</td></tr>
					<tr><td style="color:blue;">created at:</td><td>{{$author->created_at}}</td></tr>
					<tr><td style="color:blue;">last update:</td><td>{{$author->updated_at}}</td></tr>
					</table>
					<hr>
					<a href="{{ route('authorsIndex') }}" class="underline">  back  </a>
					<td><a href="{{ route('editAuthor',[$author->id]) }}" class="underline" style="margin-left: 10px;" > edit </a></td>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
