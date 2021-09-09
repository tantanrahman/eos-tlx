<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'role_id',
        'office_id',
        'name',
        'email',
        'password',
        'pic',
        'phone',
        'instagram'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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

    /**
     * 
     * 
     */

    public function drophips()
    {
        return $this->hasMany('App\Models\dropship');
    }

    /**
     * @author Tantan
     * @description Get Data For Relation User
     * @return void
     * @created 9 Sep 2021
     */
    public static function get_items_name()
    {

        $items   = self::leftjoin('officeprofile','users.office_id','=','officeprofile.id')
                        ->leftjoin('roles','users.role_id','=','roles.id')
                        ->select('officeprofile.name AS op_name','officeprofile.address AS op_address','users.username AS username','officeprofile.photo AS photo','officeprofile.whatsapp AS phone','users.name AS name','roles.name AS role');
    
        return $items->get();
    }

}
