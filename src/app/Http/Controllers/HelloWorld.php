<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorld
{
    public function hello(): String {
        return 'HEllo world';
    }
}
