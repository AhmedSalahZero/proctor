<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Section
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissionsCount
 * @property-write mixed $slug
 * @method static \Database\Factories\SectionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @mixin \Eloquent
 */
class Section extends Model
{
    use HasFactory,HasSlug;

    protected $fillable =[
        'name','slug'
    ];

    protected $casts =[
        'name'=>'array'
    ];

    public function permissions():belongsToMany
    {
        return $this->belongsToMany(
            Permission::class , 'section_permission','section_id','permission_id'
        );
    }


//    public function rule_section_id():BelongsToMany
//    {
//        return $this->belongsToMany(SectionPermission::class,'rule_section_permission','');
//    }



}
