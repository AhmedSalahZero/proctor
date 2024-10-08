<?php

namespace App\Models;

use App\Models\Traits\BindBySlug;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Media
 *
 * @property-write mixed $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $usersCount
 * @method static \Database\Factories\MediaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @mixin \Eloquent
 */
class Media extends Model
{
    use HasFactory , HasSlug , BindBySlug ;

    const OTHER_MEDIA_ID = 6 ;



    protected $casts = [
        'name'=>'array'
    ];

    protected $fillable =[
        'name','slug','link'
    ];

    public function users():hasMany
    {
        return $this->hasMany(User::class,'media_id','id');
    }

}
