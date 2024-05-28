<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        for ($i = 0; $i <= 2000; $i++) {
            DB::table('assets')->insert([
                'name' => substr(str_shuffle($letters), 0, 10),
                'slug' => substr(str_shuffle($letters), 0, 10),
                'description' => substr(str_shuffle($letters), 0, 20),
                'upload' => 'public/1707579902_cube.glb',
                'category_id' => 1,
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2025-01-01')
            ]);
        }
    }
}
