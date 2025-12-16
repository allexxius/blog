<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'body'];

    public function snippet(): Attribute {
        return Attribute::get(function () {
            return explode("\n\n", $this->body)[0];
        });
    }

    public function displayBody(): Attribute {
        return Attribute::get(function () {
            return nl2br(htmlspecialchars($this->body));
        });
    }
}
