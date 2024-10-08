<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use function App\Helper\getSection;

/**
 * App\Models\SectionPermission
 *
 * @property-read \App\Models\Permission|null $permission
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rule[] $rules
 * @property-read int|null $rulesCount
 * @property-read \App\Models\Section|null $section
 * @method static \Database\Factories\SectionPermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionPermission query()
 * @mixin \Eloquent
 */
class SectionPermission extends Model
{
    use HasFactory;

    protected $table = 'section_permission';

    protected $fillable =[
        'permission_id' , 'section_id'
    ];
    public function rules():belongsToMany
    {

        return $this->belongsToMany(Rule::class , 'rule_section_permission',
            'section_permission_id','rule_id'
        );
    }

    public function section()
    {
        return $this->hasOne(Section::class ,'id','section_id');
    }

    public function permission()
    {
        return $this->hasOne(Permission::class ,'id','permission_id');
    }

}
