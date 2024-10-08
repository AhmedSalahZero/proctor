<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Authorize;
use App\Http\Requests\StoreRuleRequest;
use App\Http\Requests\UpdateRuleRequest;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RulesController extends Controller
{
    use Authorize ;

    public function index()
    {
        return view('backend.rules.view_rules')->with('rules',Rule::all());
    }

    public function store(StoreRuleRequest $request)
    {

        Rule::create([
            'name'=>$request->input('name'),
            'slug'=>$request->input('name.en') ,
            'type'=>$request->input('type') ,
        ]);

        return redirect(route('rules.index'))->with('success',trans('lang.Rule Has Been Created Successfully'));

    }

    public function create()
    {
        return view('backend.rules.create_rule');
    }

    public function edit(Rule $rule)
    {
        return view('backend.rules.create_rule',compact('rule'));
    }

    public function update(UpdateRuleRequest $request , Rule $rule)
    {
        $rule->update(array_merge($request->only(['name','type']) , [
            'slug'=>$request->input('name.en')
        ]));

        return redirect(route('rules.index'))->with('success',trans('lang.Rule Has Been Updated Successfully'));
    }

    public function destroy(Rule $rule)
    {
        $rule->delete();

        return redirect(route('rules.index'))
            ->with('success',trans('lang.Rule Has Been Deleted Successfully'));
    }

}
