<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
        [
            'name'=>'IT',
            'category_id'=>0
        ]);
        Category::create(
        [
            'name'=>'Backend',
            'category_id'=>1
        ]);
        Category::create(
        [
            'name'=>'Frontend',
            'category_id'=>1
        ]);
        Category::create(
        [
            'name'=>'php',
            'category_id'=>2
        ]);
        Category::create(
        [
            'name'=>'mysql',
            'category_id'=>2
        ]);
        Category::create(
        
        [
            'name'=>'js',
            'category_id'=>3
        ]);
        Category::create(
        [
            'name'=>'css',
            'category_id'=>3
        ]);
    }
}
