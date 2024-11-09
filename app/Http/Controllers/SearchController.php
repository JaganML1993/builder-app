<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class SearchController extends Controller
{
    
    public function nextpage(Request $request)
    {
       // dd($request->all());
        
        $request->validate([
            'iecnumber' => 'required',
            'name'=> 'required',
            'designation' => 'required',
            
            ]);
            
           if($request->iecnumber == 123)
        {
            return view('nextpage');
        }else{
            return redirect()->back()->with('error','Please Enter the correct IEC Number');
    }
    }
    
}



?>