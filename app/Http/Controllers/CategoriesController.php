<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Authorize;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Requests\storeCategoryRequest;
class CategoriesController extends Controller
{
    use Authorize ;


    public function index()
    {
        return view('backend.categories.view',[
            'categories'=>Category::with('parentCategory')->get()
        ]);

    }


    public function create()
    {

        return view('backend.categories.crud',[
            'parentCategories'=>Category::parents()->get(),

        ]);
    }

    public function store(storeCategoryRequest $request)
    {
        $name = $request->input('name') ;


        $category = Category::create([
            'name'=>$name,
            'parent_id'=>intval(Request('parent_id')) != 0 ? Request('parent_id'): null ,
            'slug'=>$name['en']
        ]);

        return redirect(route('categories.index'))->with('success',trans('lang.Category Has Been Created Successfully'));

    }

    public function show(Category $category)
    {

    }

    public function edit(Category $category)
    {
        return view('backend.categories.crud',[
            'parentCategories'=>Category::parents()->get(),
            'category'=>$category
        ]);
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name'=>$request->input('name') ,
            'parent_id'=>intval(Request('parent_id')) != 0 ? Request('parent_id'): null ,
            'slug'=>$request->input('name.en')
        ]);

        return redirect(route('categories.index'))->with('success',trans('lang.Category Has Been Updated Successfully'));

    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success' , 'Category Deleted Successfully');
    }
}
