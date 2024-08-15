<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalProject extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'project_title', 'project_description', 'start_date', 'end_date'];
    protected $table = 'professional_projects';

    // Define inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
