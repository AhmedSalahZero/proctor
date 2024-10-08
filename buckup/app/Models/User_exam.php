<?php

namespace App\Models;

use function App\Helper\generateRandomString;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class User_exam extends Model
{
    use HasFactory;

    protected $guarded = [
    ];

    protected $primaryKey ='ID';


    public $timestamps = false ;

    protected $table ='user_exam';

    public function student()
    {
        return $this->belongsTo(Student::class , 'User_ID','ID');
    }

    public function user_answers()
    {
        return $this->belongsTo(UserAnswer::class , 'exam_id','id');
        // exam_id == user_exam_id
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class , 'exam_id','id');
    }

//    public function exam()
//    {
//        return $this->belongsTo(Exam::class , 'exam_id','id');
//    }


//    protected $guarded = [];
 //   public $score;


}
