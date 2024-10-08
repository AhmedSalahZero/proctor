<?php

namespace App\Models;

use App\Models\Traits\BindBySlug;
use App\Models\Traits\HasImage;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Product
 *
 * @property-read \App\Models\Category $category
 * @property-write mixed $slug
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory , HasSlug , BindBySlug , HasImage;

    public $BindKey = 'slug';

    protected $fillable = [
        'name','slug','price','description','image','category_id',''
    ];

    protected $casts = [
        'name'=>'array',
        'description'=>'array'
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }



}
