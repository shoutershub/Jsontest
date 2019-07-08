<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Json extends Controller
{
  public function send(Request $request){

    //return dd($request->all());
      $rules = [
        'name' => 'required|max:120|string',
        'qty' => 'required|max:120|string',
        'price' => 'required|max:120|string',
    ];

    $messages = [
        'name.required' => '* This field is required',
        'name.max' => '* This Field is too long',
        'name.string' => '* This field is invalid',

        'qty.string' => '* This field is invalid',
        'qty.max' => '* This field is too long.',
        'qty.string' => '* This field is too long.',

        
        'price.string' => '* This field is invalid',
        'price.max' => '* This field is too long.',
        'price.string' => '* This field is too long.',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);
    if ($validator->fails()) {
        return Redirect::back()->withInput()->withErrors($validator);
    }  else {
        //Lets Write the save logic
        $file_name = 'stock.json';
        $the_data  = json_encode($request->except(['_token']));

        $save = file_put_contents(public_path('/upload/json/'.$file_name), $the_data . PHP_EOL, FILE_APPEND);
        //$save = File::put(public_path('/upload/json/'.$file_name),$the_data);

        if($save){
            return redirect()->back()->withInput()->with('success', 'Items Saved succefully');
        }

    }
  }
}
