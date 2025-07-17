<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * 创建测试数据 - 只生成数据不存表
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // fakerphp.org/formatters/text-and-paragraphs/
        return [
            "title" => fake()->sentence(),
            "preview" => fake()->imageUrl(),
            "description" => fake()->sentence(),
            "price" => fake()->numberBetween(100, 999)
        ];
    }
}
