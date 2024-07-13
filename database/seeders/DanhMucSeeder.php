<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DanhMuc::factory(10)->create();
    }
}
