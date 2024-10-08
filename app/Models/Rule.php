<?php

namespace App\Models;

use App\Models\Traits\BindBySlug;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Rule
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SectionPermission[] $sectionsPermissions
 * @property-read int|null $sectionsPermissionsCount
 * @property-write mixed $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $usersCount
 * @method static \Database\Factories\RuleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rule query()
 * @mixin \Eloquent
 */
class Rule extends Model
{
    use HasFactory,HasSlug,BindBySlug;



    protected $fillable =[
        'name','slug','type'
    ];

    protected $casts =[
        'name'=>'array'
    ];

    public function users()
    {
        return $this->hasMany(User::class,'rule_id','id');
    }

    public function sectionsPermissions():belongsToMany
    {
        return $this->belongsToMany(SectionPermission::class , 'rule_section_permission',

            'rule_id','section_permission_id');
    }

    public function hasAccessTo(int $permissionId,int $sectionId ):bool
    {
        return $this->sectionsPermissions()->where('section_id',$sectionId)->where('permission_id',$permissionId)->exists() ;
    }

    public static function rulesTypes()
    {
        return [
            'backoffice' , 'website'
        ];
    }

}
