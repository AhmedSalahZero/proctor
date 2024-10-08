<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

/**
 * App\Models\User
 *
 * @property int $ID
 * @property string $UserName
 * @property string|null $email
 * @property string $Password
 * @property string|null $altEmail
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAltEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
//    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admin_users';

    protected $guarded = [];





//    const adminRule = 1 ;
//    const moderatorRule = 2 ;
//    const editorRule = 3 ;
//    const userRule = 4 ;
//    const accountRule = 5 ;
//    const defaultPassword = 123456  ;
//    const BACK_OFFICE = 'backoffice';

//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//        'phone',
////        'call_at',
//        'rule_id',
//        'address',
//        'media_id',
//
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
        'remember_token',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


//    public function __call($method, $parameters)
//    {
//        // Check Rule [is Admin , Is Moderator ... etc ]
//
//        if(Str::contains($method,'is') ){
//
//            $ruleQuery = Rule::where('slug',substr($method,'2')) ;
//
//            if($ruleQuery->exists())
//            {
//                $rule = $ruleQuery->first();
//
//                return $this->rule_id === $rule->id ;
//            }
//
//        }
//
//        return parent::__call($method, $parameters);
//    }

//    public function rule():belongsTo
//    {
//        return $this->belongsTo(Rule::class,'rule_id','id');
//    }
//
//    public function isAdmin():bool
//    {
//        return $this->rule_id === static::adminRule ;
//    }
//
//    public function isModerator():bool
//    {
//        return $this->rule_id === static::moderatorRule ;
//    }
//
//    public function isEditor():bool
//    {
//        return $this->rule_id === static::editorRule ;
//    }
//
//    public function HasAccessBackEnd():bool
//    {
//        return $this->rule->type === static::BACK_OFFICE ;
//
//    }

//    public function isUser():bool
//    {
//        return $this->rule_id === static::userRule ;
//    }
//
//    public function isAccount():bool
//    {
//        return $this->rule_id === static::accountRule ;
//    }
//
//    public function media()
//    {
//        return $this->belongsTo(Media::class,'media_id','id');
//    }
    public static function generateRandomPassword($length)
    {
        $numbers = '0123456789';
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = '';
        for ($i = 0; $i < $length/2; $i++) {
            $randString .= $characters[rand(0, strlen($characters)-1)];
        }
        for ($i = 0; $i < $length/2 ; $i++) {
            $randString .= $numbers[rand(0, strlen($numbers)-1)];
        }

        return $randString;
    
    }
        

}
