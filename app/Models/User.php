<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeFilter($query,array $filters){
        if($filters['name']??false){
            $query->where('name','like','%'.request('name').'%');
        }
        if($filters['email']??false){
            $query->where('email','like','%'.request('email').'%');
        }
        if($filters['id']??false){
            $query->where('user_id','like','%'.request('id').'%');
        }
        if($filters['sort_by']??false && $filters['sort_order']??false){
            if(!in_array(request('sort_by'),['name','email','id','balance'])){
                abort(403,"invalid sort key");
            }
            if(!in_array(request('sort_order'),['asc','desc'])){
                abort(403,'invalid sort order');
            }
        $query->orderBy(request('sort_by'),request('sort_order'));
        }
    }
}
