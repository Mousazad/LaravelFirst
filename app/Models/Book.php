<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
	protected $fillable = ['title','publication-year','cover_file_name','original_cover_file_name'];
	
	public function authors()    
	{        				
		return $this->belongsToMany('App\Models\Author')->withTimestamps();
   	}

}
