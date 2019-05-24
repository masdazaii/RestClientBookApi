<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='book';

    protected $primaryKey = 'id_book';
    
    //disable created_at and updated_at
    public $timestamps = false;
    //fillable column
    protected $fillable = [
    	'id_category',
		'id_penerbit', 
		'judul',
		'pengarang',
		'isbn',	
		'tahun',
		'file',
		'thumbnail',
		'uploader',
		'upload_at'
    ];

    function category()
    {
        return $this->belongsTo('App\Catregory','id_category');
    }
}
