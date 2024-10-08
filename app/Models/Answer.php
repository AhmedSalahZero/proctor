<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Answer.
 *
 * @property int $ID
 * @property string $Answer
 * @property int $QuestionID
 * @property int $IsRight
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereIsRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereQuestionID($value)
 * @mixin \Eloquent
 */
class Answer extends Model
{
    use HasFactory;

    const NUMBEROFANSWERS = 4;

    protected $table = 'mcq_answer';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'ID';

    protected $fillable = ['answer', 'Is_Right', 'Question_ID'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'Question_ID', 'ID');
    }
}
