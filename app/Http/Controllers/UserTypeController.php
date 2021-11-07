<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $userTypes=UserType::all()->sortBy('type_name');
        return view('usertype.index',compact('userTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usertype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'name'=>'required|min:4'

       ]);

       $usertype=new UserType();
       $usertype->type_name=$request->name;
       $usertype->save();

       session()->flash('status', __('User Type Created!'));
       return redirect()->route('usertypes.show', $usertype);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $usertype)
    {
        return view('usertype.show',compact('usertype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Type  $user_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(UserType $usertype)
    {
        return view('usertype.edit',compact('usertype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserType $usertype)
    {
        $request->validate([
            'name'=>'required|min:4'
 
        ]);
 
        $usertype->type_name=$request->name;
        $usertype->save();
 
        session()->flash('status', __('User Type Edited!'));
        return redirect()->route('usertypes.show', $usertype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Type  $user_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserType $usertype)
    {
        $usertype->delete();

        session()->flash('status','Use Type Deleted!');
        return redirect()->route('usertypes.index');

    }
}
