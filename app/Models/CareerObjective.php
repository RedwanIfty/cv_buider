<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerObjective extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'objective'];
    protected $table = 'carrier_objectives';

    // Define inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
