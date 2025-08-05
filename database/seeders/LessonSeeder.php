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
        // 传参：属性、章节
        Lesson::factory(9)->has(Chapter::factory(6)-> hasVideos(10 , function(array $attributes, Chapter $chapter) {
            // 章节建立了关联从6条数据中取回数据
            //return [ "lesson_id" => $chapter -> lesson -> id ];
            // 已经有了课程ID直接取属性就行
            return [ "lesson_id" => $chapter -> lesson_id ];
        }))->create(); // 在创建课程时候，把6个章节创造出来,hasVideos,替换has(Video::factory())要保证Model中Videos存在
    }
}
