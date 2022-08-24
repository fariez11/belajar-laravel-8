<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class posting extends Model
// {
//     use HasFactory;
// }

class Posting {

    private static $blog_posts = [
        [
            "title" => "Posts Pertama",
            "slug" => "judul-pertama",
            "author" => "Fariez",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia adipisci quas suscipit aspernatur beatae, perferendis
            veritatis amet voluptas provident at quibusdam et inventore corrupti. Expedita placeat sit aliquam enim nulla, aliquid
            sunt est, illo officiis veritatis ab voluptatum dolores nemo! Quisquam ex laudantium maxime quia explicabo est beatae
            quas enim dicta sunt, dolorem similique hic numquam libero? Velit maxime eius deserunt sit nemo delectus, dolorem soluta
            doloremque praesentium exercitationem magnam iusto earum culpa quidem et ipsa atque, reiciendis explicabo aliquam."
        ],
        [
            "title" => "Posts Kedua",
            "slug" => "judul-kedua",
            "author" => "Wibowo",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit repellat modi iusto maiores, neque unde
            accusantium quasi quaerat veniam harum in minima molestias nemo excepturi soluta qui repudiandae, laudantium autem
            dolores eligendi architecto similique! Nulla recusandae atque, quam aperiam repellendus dolor odit ea dolore voluptates
            aliquid, ut voluptate eveniet. Non error exercitationem quasi et maiores tenetur rerum saepe asperiores voluptate
            repellendus ipsam maxime modi beatae odit quas deleniti reprehenderit, cupiditate enim obcaecati ipsum, at fugit sit
            consequuntur voluptatem? Iste doloremque necessitatibus, quia qui quibusdam ratione aut enim laborum veritatis
            recusandae."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        // $post = [ ];
        // foreach($posts as $p){
        //     if($p["slug"] == $slug){
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }

}
