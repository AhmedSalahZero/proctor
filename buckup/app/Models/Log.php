<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function instructor()
    {
        return $this->belongsTo(Student::class ,'instructor_id' ,'id');
    }
    public function getInstructorName()
    {
        return $this->instructor->User_Name ; 
    }
    public function getCreatedAt()
    {
        return Carbon::make($this->created_at)->format(getDefaultDateTimeFormat());
    }
    
}
