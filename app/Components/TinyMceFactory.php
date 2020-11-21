<?php declare(strict_types=1);


namespace App\Components;


interface TinyMceFactory
{
    public function create(): TinyMce;
}
