<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(6, 15));
        $rand = fake()->randomNumber();
        $slug = Str::of($title . ' ' . $rand)->slug();
        return [
            "judul_artikel" => $title,
            "slug" => $slug,
            "thumbnail_artikel" => fake()->imageUrl($width = 640, $height = 480),
            "isi_artikel" => $this->getFakeParagraph(),
            "kategori_artikel" => $this->getFakeCategory(),
            "tag_artikel" => json_encode(["eco-friendly", "eco-food", "go-green"])
        ];
    }

    private function getFakeParagraph()
    {
        $paragraphs = rand(1, 5);
        $i = 0;
        $ret = "";
        while ($i < $paragraphs) {
            $ret .= "<p>" . fake()->paragraph(rand(3, 6)) . "</p>";
            $i++;
        }
        return $ret;
    }

    private function getFakeCategory(){
        $category = ['Food', 'Drink', 'Dessert', 'Eco'];
        $index = rand(0, count($category) -1 );

        return $category[$index];
    }
}
