<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Admin;
use App\Models\Media;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    public function index()
    {

        return view('backend.users.view_users')
            ->with('users',Admin::all());

    }

    public function create()
    {
        return view('backend.users.crud',$this->data(new User()))->with('rules',Rule::all())
            ->with('medias',Media::all());
    }


//    public function store(StudentRequest $request)
//    {
//
//
//        User::create($this->getUserData($request));
//
//        return redirect(route('users.index'))->with('success',trans('lang.New User Has Been Created'));
//    }


    public function show($id)
    {

    }


    public function edit(User $user)
    {

        return view('backend.users.crud',$this->data($user))->with('rules',Rule::all())->with('medias',Media::all());
    }


//    public function update(UpdateUserRequest $request, User $user)
//    {
//        $user->update($this->getUserData($request));
//
//        return redirect(route('users.index'))->with('success',trans('lang.User Has Been Updated Successfully'));
//
//    }


//    public function destroy(User $user)
//    {
//        $user->delete();
//
//        return redirect()->back()->with('success',trans('lang.User Has Been Deleted Successfully'));
//    }

    private function getUserData(Request $request)
    {
        $rule = Rule::where('id',$request->input('rule_id'))->first();

        return array_merge(
            $request->only(['name','email','phone','address','rule_id']) , [
                'password'=> Hash::make($request->input('password') ?? User::defaultPassword) ,
                'media_id'=>$rule->type === 'website' ? $request->input('media_id') : null
            ]
        ) ;

    }

}
