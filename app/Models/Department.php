<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function papers()
    {
        return $this->hasMany(Paper::class);
    }
}
