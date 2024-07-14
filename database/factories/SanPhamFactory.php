<?php

namespace Database\Factories;

use App\Models\DanhMuc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SanPham>
 */
class SanPhamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_san_pham' => $this->faker->word,
            'ma_san_pham' => $this->faker->unique()->bothify('SP-#####'),
            'hinh_anh' => $this->faker->imageUrl,
            'mo_ta' => $this->faker->sentence,
            'gia' => $this->faker->randomFloat(2, 1000, 100000),
            'so_luong' => $this->faker->numberBetween(1, 100),
            'ngay_san_xuat' => $this->faker->date,
            'trang_thai' => $this->faker->boolean,
            'danh_muc_id' => DanhMuc::factory(), // Tạo liên kết đến danh_muc
        ];
    }
}
