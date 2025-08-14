<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chapter extends Model
{
    /** @use HasFactory<\Database\Factories\ChapterFactory> */
    use HasFactory;

    // 设置章节填充字段
    protected $fillable = [
        'title',
        'preview',
        'description'
    ];
    // 章节中包含多个视频
    public function videos() {
        return $this->hasMany(Video::class);
    }

    // 反向关联
    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}
