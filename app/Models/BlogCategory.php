<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(BlogCategory::class);
//        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');

    }
}
