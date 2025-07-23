<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    /**
     * 定义关联关系
     */
    public function chapters() {
        // 包含多个章节
        return $this->hasMany(Chapter::class);
    }
}
