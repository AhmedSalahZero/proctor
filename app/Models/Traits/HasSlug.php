<?php

namespace App\Models\Traits ;
use Illuminate\Support\Str;
trait HasSlug
{
    public function setSlugAttribute($value)
    {

        $this->attributes['slug'] = Str::slug($value);
    }




}
