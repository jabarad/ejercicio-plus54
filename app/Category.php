<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['name'];

    public $timestamps = false;
}
