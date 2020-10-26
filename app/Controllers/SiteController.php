<?php


namespace App\Controllers;


use App\Framework\Application\ServiceProviders\ViewServiceProvider;
use App\Framework\Kernel\Application;
use App\Models\Book;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequest;

class SiteController
{
    function index(ServerRequest $request){
        $book = Book::class;
        return view('index', [
            'book' => $book
        ]);
    }
}