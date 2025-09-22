<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/NewsFactory.php

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6), // สร้างประโยค 6 คำเป็นหัวข้อข่าว
            'content' => $this->faker->paragraphs(5, true), // สร้างเนื้อหา 5 พารากราฟ
            'image_url' => 'https://placehold.co/600x400', // ใช้รูปภาพชั่วคราว
            'published_at' => now(),
        ];
    }
}
