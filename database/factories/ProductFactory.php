<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgName = $this->faker->image(storage_path("app/public/uploads/products"), $width = 500, $height = 500, 'rooms', false);
        return [
            'name'=>$this->faker->name,
            'price'=>rand(1000, 10000000),
            'image'=>'uploads/products/'. $imgName,
            'content' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'desc' => $this->faker->realText($maxNbChars = 400, $indexSize = 2),
            'price'=>rand(100000, 10000000),
            'cate_id'=>Category::all()->random()->id,
            'branch_id'=>Branch::all()->random()->id,
        ];
    }
}
