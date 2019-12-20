<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function countryList()
    {
     
        return response()->download(public_path('img-user.png'), 'User Image');
    }
    public function countrySave(Request $request)
    {
        $fileName = "user_image.jpg";
        $path = $request->file('photo')->move(public_path("/"),$fileName);
        $photoURL = url('/'.$fileName);
        return response()->json(['url' => $photoURL], 200);
    }
}
