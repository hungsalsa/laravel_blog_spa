<?php

namespace Database\Seeders;

use App\Models\Admin\PostCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('vi_VN');
        foreach (range(1, 500) as $i) {
            PostCategory::create([
                'cateName' => $faker->name,
                'slug' => $faker->slug,
                // 'parent_id' => 0,
                'title' => $faker->name,
                'keyword' => $faker->name,
                'description' => $faker->name,
                'content' => $faker->sentence(400),
                'short_description' => $faker->sentence(80),
                'order' => rand(0, 5),
                'status' => 1,
                'userCreated' => rand(1, 3),
            ]);
        }
    }
}