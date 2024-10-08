<?php

namespace App\Observers;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request ;
class categoryObserver

{

    public function creating(category $category)
    {


    }



    public function deleting(category $category)
    {
        $category->HasChildren() ? $category->subCategories()->delete()  : '';
    }
}
