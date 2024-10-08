<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorCertification extends Model
{
    protected $guarded = ['id'];
    public function instructor()
    {
        return $this->hasOne(Student::class , 'instructor_certification_id' , 'id');
    }
    
    public function courses()
    {
        return $this->belongsToMany(CourseType::class , 'certification_course' , 'certification_id' , 'course_id');
    }
    public function assignCourses(array $courses)
    {
        foreach($courses as $course)
        {
            $this->courses()->attach($course);
        }
    }

    public function getCertificateDateFormatted()
    {
        return formatCertificationDate($this->certificate_date) ;
    }
    
    public function getCertificationExpirationDateFormatted()
    {
        return formatCertificationDate($this->expiration_date) ;
    }

    
}
