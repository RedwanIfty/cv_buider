<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalExperience extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'organization_name', 'role', 'start_date', 'end_date', 'details'];
    protected $table = 'external_experiences';

    // Define inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
