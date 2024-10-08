<?php
namespace App\Models\Traits ;
use Illuminate\Database\Eloquent\Builder ;

trait HasChildren{

    public function scopeParents(Builder $builder)
    {
        return $builder->whereNull('parent_id');
    }
    public function scopeChildren(Builder $builder)
    {
        return $builder->whereNotNull('parent_id');
    }

    public function isParent()
    {
        return $this->parent_id === null ;
    }


}
