<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $with = [
        'question'
    ];
    

    protected $table = 'user_answers';

    protected $primaryKey = 'ID';

    protected $guarded = [ ] ;

    public $timestamps = false ;


    public function user_exam()
    {
        return $this->belongsTo(User_exam::class,'Test_ID','id');
    }

//    public function exam()
//    {
//        return $this->belongsTo(Exam::class,'Test_ID','id');
//    }

    public function question()
    {
        return $this->belongsTo(Question::class,'Question_ID','ID');
    }
    public function scopeOnlyUserExam(Builder $query , int $user_exam_id):Builder
    {
        return $query->where('Test_ID',$user_exam_id);
    }
    public function scopeOnlyQuestions(Builder $query , int $questionID):Builder
    {
        if($questionID) {

            return $query->where('Question_ID',$questionID);

        }

        return $query;
    }

}
