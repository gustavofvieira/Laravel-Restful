<?php

// Criado com php artisan make:controller Country\Country --resource
namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryModel;
class Country extends Controller
{

    public function index()
    {
        $countryList = CountryModel::paginate(10);
        return response()->json($countryList, 200);
        //return response()->json(CountryModel::get(), 200);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'iso' => 'required|min:2|max:2',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }


    public function show($id)
    {
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Arquivo não encontrado!"], 404);
        }else{
            return response()->json($country, 200);  
        }
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Arquivo não encontrado!"], 404);  
        }else{
            $country->update($request->all());
            return response()->json($country, 200);
        }
    }


    public function destroy($id)
    {
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Arquivo não encontrado!"], 404);  
        }else{
            $country->delete();
            return response()->json(null, 204);
        }
    }
}
