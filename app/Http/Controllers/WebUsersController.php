<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebUsers;
use App\Models\Country;
use App\Models\State;
use App\Models\City;


class WebUsersController extends Controller
{
    public function index()
    {
        $web_users = WebUsers::with('country')->get();
        $web_users = WebUsers::with('state')->get();
        $web_users = WebUsers::with('city')->get();
        return view ('welcome', compact('web_users'));
    }

    public function create()
    {
        $data['countries'] = Country::get(["name","id"]);
        return view('users.create',$data);
    }

    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)
        ->get(["name","id"]);
        return response()->json($data);
    }

    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
        ->get(["name","id"]);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:web_users',
            'password' => 'required|min:8'
        ]);

        $web_user = new WebUsers;
        $web_user->name = $request->name;
        $web_user->email = $request->email;
        $web_user->password = $request->password;
        $web_user->country_id = $request->country_id;
        $web_user->state_id = $request->state_id;
        $web_user->city_id = $request->city_id;
        $web_user->role = json_encode($request->role);
        $web_user->save();

        session()->flash('message', 'New User Added Successfully!!');
        return redirect('/');
    }

    public function edit($web_user)
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $web_user = WebUsers::find($web_user);
        return view('users.edit',compact('web_user','countries','states','cities'));
    }

    public function update(Request $request,$web_user)
    {

        $input = $request->all();

        $web_user = WebUsers::find($web_user);
        $web_user->name = $input['name'];
        $web_user->email = $input['email'];
        $web_user->password = $input['password'];
        $web_user->country_id = $input['country_id'];
        $web_user->state_id = $input['state_id'];
        $web_user->city_id = $input['city_id'];
        $web_user->role = $input['role'];

        $web_user->save();
        session()->flash('message', $input['name'].' Updated Successfully!!');
        return redirect('/');
    }

    public function delete($web_user)
    {
        WebUsers::find($web_user)->delete();
        session()->flash('message', 'User Deleted Successfully!');

        return redirect()->back();
    }
}
