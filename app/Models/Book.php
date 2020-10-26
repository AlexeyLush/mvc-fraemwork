<?php


namespace App\Models;


use ActiveRecord\Model;

class Book extends Model
{
    public static $primary_key = 'id';
    public static $table_name = 'books';

}