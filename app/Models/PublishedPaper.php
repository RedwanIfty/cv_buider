<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishedPaper extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'journal_name', 'publication_date', 'paper_link'];
    protected $table = 'published_papers';

    // Define inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
