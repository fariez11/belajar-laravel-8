<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // User::create([
        //     'name' => "Sandhika Galih",
        //     'email' => "sandhikagalih@gmail.com",
        //     'password' => bcrypt('12345')
        // ]);

        User::create([
            'name' => "Budi Octaviany",
            'username' => "budio03",
            'email' => "budio03@gmail.com",
            'password' => bcrypt('password')
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit unde, culpa necessitatibus,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit unde, culpa necessitatibus, officiis ea possimus exercitationem rem hic quo architecto beatae tempore, maiores repudiandae dicta porro eos consequatur sunt! Dignissimos labore expedita alias quos ducimus doloribus, a dolorum quidem cumque at nesciunt autem consequatur magnam exercitationem provident incidunt vitae saepe asperiores nihil velit consectetur fugit laboriosam unde cupiditate? Numquam atque consequatur accusantium quaerat doloribus fugiat vel unde officia saepe, cumque nam? Magnam laboriosam inventore impedit doloribus, temporibus perspiciatis voluptatem voluptates. Eveniet, itaque rem quia nulla fugiat sit consequuntur suscipit delectus ut, earum pariatur beatae labore, ratione deleniti quis repellendus quam!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);


    }
}
