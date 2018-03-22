<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Field;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $parent_id = $request->get('parent_id');
        $fields = Field::where('parent_id', '=', $parent_id)->get();
        
        if (count($fields) > 0) {
            return view('fields.index', compact('fields'));
        }
        
        $field = Field::find($parent_id);
        
        // childrenがない場合、Userが見れるようにする
        return view('users.index', $field->users);
    
    }

}