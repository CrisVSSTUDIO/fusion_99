<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'upload',
        'category_id',
        'slug',
        'filetype',
        'filesize',
        'filetype_prediction'
    ];

    public function category()

    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->limit(4);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
