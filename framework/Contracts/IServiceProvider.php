<?php


namespace App\Framework\Contracts;


interface IServiceProvider
{
    function register();
    function boot();
}