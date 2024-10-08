<?php

namespace App\Models\Traits;

trait BindBySlug
{
    // For Package ;

    public $BindKey = 'slug';

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
