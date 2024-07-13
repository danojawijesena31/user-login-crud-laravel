<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;


class MemberController extends Controller
{
    public function index()
    {
        $members = Member::paginate(2);
        // dd($members);
        return view('members.index', compact('members')); // Pass members data to view
    }

    public function create(){
        return view('members.create');
    } 

    Public function memberPost(Request $request){
        $data =$request->validate([
            'name'=> 'required',
            'address'=>'required',
            'phone_number'=>'required|digits:9'
        ]);
        // dd($request->name);

        $newMember = Member::create($data);
        if($newMember){
            return redirect(route('member.index'))->with("success", "Member Registration successful!");
        }
        return redirect(route('member.create'))->with("error", "Registration failed, try again.");
        
    }

    public function edit(Member $member){
        return view ('members.edit', ['member' => $member]);
    }

    public function update(Member $member, Request $request){
        $data =$request->validate([
            'name'=> 'required',
            'address'=>'required',
            'phone_number'=>'required|digits:9'
        ]);

        $member->update($data);

        return redirect(route('member.index'))->with("success", "Member Update successful!");
    } 

    public function delete(Member $member){
        $member->delete();
        return redirect(route('member.index'))->with("success", "Member Delete successful!");
    }

    public function view(Member $member){
        return view ('members.view', ['member' => $member]);
    }
}
