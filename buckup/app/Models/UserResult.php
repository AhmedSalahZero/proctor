<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResult extends Model
{
    use HasFactory;

    protected $table = 'user_result';

    protected $primaryKey = 'ID';

    public function student()
    {
        return $this->belongsTo(Student::class,'User_ID','ID');
    }

    public function scopeOnlyNotDeleted(Builder $builder):builder
    {
        return $builder->where('Deleted',0);
    }

}
