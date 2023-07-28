<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'author',
        'published_at',
        'publication_place',
        'section_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
