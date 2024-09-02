<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbcBankStatement extends Model
{
    use HasFactory;

    protected $table = 'abc_bank_statements';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'related_user_id',
        'amount',
        'type',
        'details',
        'balance',
        'transaction_reference',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(AbcBankUser::class, 'user_id');
    }

    public function relatedUser()
    {
        return $this->belongsTo(AbcBankUser::class, 'related_user_id');
    }
}
