<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paper extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'publisher',
        'published_at',
        'department_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
