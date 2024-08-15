<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalExperience extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'company_name', 'job_title', 'start_date', 'end_date', 'job_description'];
    protected $table = 'professional_experiences';

    // Define inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
