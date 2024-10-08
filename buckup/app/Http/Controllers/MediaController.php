<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Traits\Authorize;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Media;
use App\Models\Rule;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MediaController extends Controller
{
    use Authorize ;

    public function index()
    {

        return view('backend.media.view',[
            'socialMedia'=>Media::where('slug','!=','other')->get()
        ]);

    }

    public function create()
    {
        return view('backend.media.crud',$this->data(new Media()))
            ->with('medias',Media::all());
    }


    public function store(StoreMediaRequest $request)
    {

        Media::create(array_merge( $request->only(['name','link']) , [
            'slug'=>$request->input('name.en'),
        ]));

        return redirect(route('social-media.index'))->with('success',trans('lang.New Social Media Has Been Created'));
    }


    public function show(Media $media)
    {

    }


    public function edit(Media $media)
    {

        return view('backend.media.crud',$this->data($media))->with('medias',Media::all());
    }


    public function update(UpdateMediaRequest $request, Media $media)
    {

        $media->update(
            array_merge( $request->only(['name','link']) , [
                'slug'=>$request->input('name.en')
            ])
        );

        return redirect(route('social-media.index'))->with('success',trans('lang.Media Has Been Updated Successfully'));

    }

    public function destroy(Media $media)
    {
        $media->delete();

        return redirect()->back()->with('success',trans('lang.Media Has Been Deleted Successfully'));
    }


}
