<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'institution_name', 'degree', 'grade', 'start_date', 'end_date'];
    protected $table = 'educations';

    // Define inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
