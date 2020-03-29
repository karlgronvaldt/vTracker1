<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocData extends Model
{
    protected $fillable = [
    	'lat',
    	'long',
    	'code',
    	'gender'
    ];

    protected $casts = [
    	'lat' => 'double',
    	'long' => 'double',
    	'code' => 'integer',
    	'gender' => 'integer'
	];
}
