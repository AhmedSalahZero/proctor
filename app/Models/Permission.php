<?php

namespace App\Models;

use App\Models\Traits\BindBySlug;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Section[] $sections
 * @property-read int|null $sectionsCount
 * @property-write mixed $slug
 * @method static \Database\Factories\PermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @mixin \Eloquent
 */
class Permission extends Model
{
    use HasFactory,HasSlug,BindBySlug;

    protected $fillable = [
        'name','slug'
    ];

    protected $casts =[
        'name'=>'array'
    ];


    public function sections():belongsToMany
    {
        return $this->belongsToMany(Section::class , 'section_permission','permission_id',
            'section_id')->withPivot('id');
    }

    public static function index()
    {
        return route('permissions.index');
    }

}
