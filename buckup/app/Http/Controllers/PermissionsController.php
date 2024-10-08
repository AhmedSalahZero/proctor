<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Authorize;
use App\Http\Requests\UpdatePermissionRquest;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest ;

class PermissionsController extends Controller
{
    use Authorize ;

   public function index()
   {
       return view('backend.permissions.view_permissions')->with('permissions',Permission::all());
   }

   public function store(StorePermissionRequest $request)
   {

       Permission::create(
           array_merge($request->only('name') ,[
               'slug'=> $request->input('name.en')
           ])
       );

       return redirect(Permission::index())->with('success',trans('lang.Permission Has Been Created Successfully'));

   }

   public function create()
   {
       return view('backend.permissions.create_permission');
   }

   public function edit(Permission $permission )
   {
       return view('backend.permissions.create_permission',compact('permission'));
   }

   public function update(UpdatePermissionRquest $request , Permission $permission)
   {
       $permission->update(
           array_merge($request->only('name') , [
               'slug'=>$request->input('name.en')
           ])
       );

       return redirect(Permission::index())->with('success',trans('lang.Permission Has Been Created Successfully'));
   }

   public function destroy(Permission $permission)
   {

       $permission->delete();

       return redirect(Permission::index());

   }
}
