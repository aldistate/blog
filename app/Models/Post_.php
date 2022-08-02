<?php

namespace App\Models;

class Post {
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Aldi Putra Nawasta",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum nostrum architecto natus harum nam eius dolorem animi libero obcaecati doloribus ea quidem voluptates repudiandae, adipisci quos odio nobis temporibus tempore dolorum impedit incidunt excepturi sit! Nam quae fugit nihil tenetur tempora ullam delectus dolor, officiis praesentium alias sunt! Esse, voluptatem?",
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Eliza Alya Safira",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora assumenda doloribus labore at molestiae soluta cum accusamus inventore, reprehenderit illo consectetur deserunt maxime esse molestias quae error sunt, rem eveniet? Deserunt porro totam molestias consequuntur suscipit veniam, recusandae ab autem corporis harum odit labore architecto odio, cumque est? Modi cumque, earum odit quod ad optio excepturi repellendus ducimus veniam repudiandae rem dolore atque rerum reprehenderit voluptate ex est corporis consequuntur. Quae quo, ipsam illum ab voluptatem nemo? Eveniet porro deleniti minima, consequuntur, alias ullam, mollitia placeat in quaerat harum temporibus ipsam et sequi repellendus? Minima praesentium reprehenderit reiciendis corrupti dicta.",
        ],
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        // $post = [];
        // foreach($posts as $p){
        //     if($p["slug"] === $slug){
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere("slug", $slug);
    }
}
