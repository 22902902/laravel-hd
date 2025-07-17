<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // 执行填充数据,执行php artisan db:seed
        // php artisan migrate:fresh --seed 表全删干净，再创建表，再填充数据
        $this->call([
            LessonSeeder::class,
        ]);
    }
}
