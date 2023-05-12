<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    private static $selectedFields = [
        'id',
        'user_id',
        'name',
        'description',
        'img',
        'status',
        'created_at',
        'update_at',
        'complite_at'
    ];

    public function tags()
    {

        $tags = $this->belongsToMany(Tag::class);

        return $tags;

    }

    public function getTagsArray(): array
    {
        $return = [];
        $tags = self::getTags();

        if ($tags) {
            foreach ($tags as $tag) {
                $return[$tag->id] = '#' . $tag;
            }
        }

        return $return;
    }
}
