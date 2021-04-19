<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Acc_year extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public $table="acc_year";
    protected  $fillable= [
				"department",
				"year",
				    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
      
    ];
*/
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	 /*
    protected $casts = [
       // 'email_verified_at' => 'datetime',
    ];
	
	public function products()
	{
    return $this->hasMany(Product::class);
	}
	*/
}
?>