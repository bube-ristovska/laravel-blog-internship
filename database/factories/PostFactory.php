<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title'=>$this->faker->sentence,
            'excerpt'=>$this->faker->sentence,
            'slug'=>$this->faker->slug,
            'body'=>$this->faker->paragraph,
        ];
    }

}
