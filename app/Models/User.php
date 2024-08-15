<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function carrierObjectives()
    {
        return $this->hasMany(CarrierObjective::class, 'user_id', 'id');
    }

    public function technicalSkills()
    {
        return $this->hasMany(TechnicalSkill::class, 'user_id', 'id');
    }

    public function professionalExperiences()
    {
        return $this->hasMany(ProfessionalExperience::class, 'user_id', 'id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class ,'user_id', 'id');
    }

    public function professionalProjects()
    {
        return $this->hasMany(ProfessionalProject::class ,'user_id', 'id');
    }

    public function publishedPapers()
    {
        return $this->hasMany(PublishedPaper::class, 'user_id', 'id');
    }

    public function externalExperiences()
    {
        return $this->hasMany(ExternalExperience::class, 'user_id', 'id');
    }

    public function references()
    {
        return $this->hasMany(Reference::class, 'user_id', 'id');
    }
}
