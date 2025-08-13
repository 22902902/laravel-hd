<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    // 告诉它哪些数据是要填的
    protected $fillable = [
        'title',
        'description',
        'preview'
    ];

    /**
     * 定义关联关系
     */
    public function chapter() {
        // 包含多个章节
        return $this->hasMany(Chapter::class);
    }

    // 课程中关联定义上
    public function videos() {
        return $this->hasMany(Video::class);
    }
}
