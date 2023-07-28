<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'department_id'];

    protected $searchableFields = ['*'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
