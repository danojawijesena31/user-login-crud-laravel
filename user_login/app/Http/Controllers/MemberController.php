<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;


class MemberController extends Controller
{
    public function index(){
        return view('members.index');
    } 

    public function create(){
        return view('members.create');
    } 

    Public function memberPost(Request $request){
        $request->validate([
            'name'=> 'required',
            'address'=>'required',
            'phone_number'=>'required|digits:10'
        ]);

        $data['name']= $request->name; 
        $data['address'] = $request->address;
        $data['phone_number'] = $request->phone_number;
    }
}
