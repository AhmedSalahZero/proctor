<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Question.
 *
 * @property int $ID
 * @property string $Question
 * @property int $TypeID
 * @property int $TestID
 * @property string|null $TextAnswer
 * @property int $Degree
 * @property int $Num
 * @property string $Type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answersCount
 * @property-read \App\Models\Exam $exam
 * @method static \Database\Factories\QuestionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTestID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTextAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTypeID($value)
 * @mixin \Eloquent
 */
class Question extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $fillable = [
        'Question', 'Type_ID', 'Test_ID', 'Type', 'Degree', 'Text_Answer', 'Num',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    // const NUMBEROFANSWERS = 4 ;

    public function answers()
    {
        return $this->hasMany(Answer::class, 'Question_ID', 'ID');
    }

    public function getAnswersRecords(array $questionAnswers, int $questionID, int $correctAnswer):array
    {
        $answers = [];

        for ($answer = 1; $answer <= Answer::NUMBEROFANSWERS; $answer++) {
            array_push($answers, [
                    'answer'=>$questionAnswers[$answer],
                    'Is_Right'=>$correctAnswer === $answer,
                ]
            );
        }

        return $answers;
    }

    // public function exam():belongsTo
    // {
    //     return $this->belongsTo(Exam::class, 'Test_ID');
    // }

    public function course_type():belongsTo
    {
        return $this->belongsTo(CourseType::class, 'Type');
    }

    public function userAnswers():hasMany
    {
        return $this->hasMany(UserAnswer::class,'Question_ID','ID');
    }
}
