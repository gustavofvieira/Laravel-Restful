<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function countryList()
    {
     
        return response()->download(public_path('img-user.png'), 'User Image');
    }
}
