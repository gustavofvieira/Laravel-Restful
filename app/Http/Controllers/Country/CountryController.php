<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryModel;
use Validator;
class CountryController extends Controller
{
    public function country()
    {
        return response()->json(CountryModel::get(), 200);
    }

    public function countryByID($id)
    {
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Arquivo não encontrado!"], 404);
        }else{
            return response()->json($country, 200);  
        }
       // return response()->json(CountryModel::find($id), 200);
    }

    public function countrySave(Request $request)
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

    public function countryUpdate(Request $request, $id)
    {   
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Arquivo não encontrado!"], 404);  
        }else{
            $country->update($request->all());
            return response()->json($country, 200);
        }


    }
    public function countryDelete(Request $request, $id)
    {   

        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Arquivo não encontrado!"], 404);  
        }else{
            $country->delete();
            return response()->json(null, 204);
        }
       
    }

    /*
    public function countryUpdate(Request $request, CountryModel $country)
    {   
        $country->update($request->all());
        return response()->json($country, 200);
       // $id = CountryModel::find($id);

    }
    
    public function countryDelete(Request $request, CountryModel $country)
    {   
        $country->delete();
        return response()->json(null, 204);
        //return response()->json(['mensage' => "Excluido com sucesso"], 200);
       

    }
    */
}
