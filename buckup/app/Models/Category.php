<?php

namespace App\Models;

use App\Models\Traits\BindBySlug;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo ;
use App\Models\Traits\HasChildren ;
use Database\Factories\CategoryFactory  ;

/**
 * App\Models\Category
 *
 * @property-read Category $parentCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $productsCount
 * @property-write mixed $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $subCategories
 * @property-read int|null $subCategoriesCount
 * @method static \Illuminate\Database\Eloquent\Builder|Category children()
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category parents()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory , HasChildren , HasSlug , BindBySlug;

    protected $fillable = ['name','slug','parent_id'];

    public $BindKey = 'slug';



    public static function newFactory()
    {
        return CategoryFactory::new();
    }

    protected $casts = [
        'name'=>'array',
    ];
    // Relations
    public function subCategories():hasMany
    {
    	return $this->hasMany(Category::class , 'parent_id' , 'id');
    }
    public function parentCategory():BelongsTo
    {
    	return $this->BelongsTo(Category::class , 'parent_id', 'id');
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
    // EndRelations

    // methods

    public function HasChildren()
    {
        return $this->subCategories->count() ;
    }



    // End Methods



}
