<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function employees()
    {
        return $this->belongsToMany(User::class, 'customer_employee', 'customer_id', 'employee_id');
    }

    public function customers()
    {
        return $this->belongsToMany(User::class, 'customer_employee', 'employee_id', 'customer_id');
    }

    public function isAdmin() {
        return $this->type === 'admin';
    }
    
    public function isEmployee() {
        return $this->type === 'employee';
    }
    
    public function isCustomer() {
        return $this->type === 'customer';
    }
    

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
}
