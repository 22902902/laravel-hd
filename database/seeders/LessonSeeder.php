<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * 数据填充
 */
class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::factory(9)->has(Chapter::factory(6)-> has(Video::factory()))->create(); // 在创建课程时候，把6个章节创造出来
    }
}
