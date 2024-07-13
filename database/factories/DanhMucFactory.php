<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DanhMuc>
 */
class DanhMucFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_danh_muc' => $this->faker->sentence(3),
            // 'mo_ta' => $this->faker->paragraph(3),
            // 'ngay_tao' => now(),
            // 'nguoi_tao_id' => 1, // User ID,
            // 'trang_thai' => 1, // Active status,
            // 'parent_id' => 0, // Root category,
            // 'anh_dai_dien' => null, // No image,
            // 'so_san_pham' => 0, // No products,
        ];
    }
}
