<?php

namespace Database\Seeders;

use App\Models\SanPham;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SanPham::factory(10)->create();
    }
}
