<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Authorize;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Authorize ;

    public function index()
    {
        return view('backend.products.view',[
           'products'=>Product::with('category')->get()
        ]);
    }


    public function create()
    {

       return view('backend.products.crud',array_merge($this->data(new Product()) , [
        'categories'=>Category::all()
       ]));

    }


    public function store(StoreProductRequest $request)
    {

        Product::create(array_merge(
            $request->only(['name.en','name.ar','description.en','description.ar','price','category_id'])
            ,['slug'=>$request->input('name.en') ,
                'image'=>$request->file('image')->store('Products','public')
                ]));

        return redirect(route('products.index'))->with('success',trans('lang.Product Has Been Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('backend.products.crud',
            $this->data($product, ['categories'=>Category::all()]));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {


            $product->update(
                array_merge(
                    $request->only(['name.en','name.ar','description.en','description.ar','price','category_id'])
                    ,['slug'=>$request->input('name.en') ,
                    'image'=>$product->getImagePath()
                ])
            );

            return redirect(route('products.index'))->with('success',trans('lang.Product Has Been Updated Successfully'));

    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success',trans('lang.Product Has Been Deleted Successfully'));
    }
}
