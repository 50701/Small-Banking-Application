<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Update this
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbcBankUser extends Authenticatable // Extend Authenticatable
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'abc_bank_users';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'agreed_to_terms',
        'balance',
        'remember_token',
    ];

    // Cast attributes to specific data types
    protected $casts = [
        'agreed_to_terms' => 'boolean',
        'balance' => 'decimal:2',
    ];

    // Define relationships (if any)
    public function statements()
    {
        return $this->hasMany(AbcBankStatement::class, 'user_id');
    }

    // Optional: Override method if you use custom password column
    public function getAuthPassword()
    {
        return $this->password;
    }
}
