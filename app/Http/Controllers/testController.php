<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class testController extends Controller
{

    public function hello()
    {
        return view('test', ['varijabla' => 'vrijednost ove varijable']);
    }

}
