<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    // 视频模型属于哪个课程
    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    // 属于哪个章节
    public function chapter() {
        return $this->belongsTo(Chapter::class);
    }
}
