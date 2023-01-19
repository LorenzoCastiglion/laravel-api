<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewContact;
use illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request){


        $data = $request->all();

        $validator = validator::make($data, [
            'name' => 'require',
            'email' => 'required|emal',
            'message'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        // mail a cui arriva la mail inviata dal form sul sito
        Mail::to('lorenzo.castiglion@hotmail.it')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true,
            
        ]);


    }
}
