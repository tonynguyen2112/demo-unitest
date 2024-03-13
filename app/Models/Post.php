<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    public function url(): string
    {
        return url('posts/' . $this->getKey());
    }

    public function subscriptionUrl(): string
    {
        return url('posts/' . $this->getKey() . '/subscription');
    }
}
