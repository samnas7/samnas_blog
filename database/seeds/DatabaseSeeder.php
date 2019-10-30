<?php

use Illuminate\Database\Seeder;
use Database\Seeds\PostTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(PostTableSeeder::class);
        /*
          factory(App\User::class, 10)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make())->create()->each(function ($post) {
                $post->images()->save(factory(App\Image::class)->make());
            });
        }); 
        */

        /* 
        INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES (NULL, 'Admin\r\n', CURRENT_TIME(), NULL), (NULL, 'Editor', CURRENT_TIME(), NULL), (NULL, 'Author', CURRENT_TIME(), NULL), (NULL, 'Contributor', CURRENT_TIME(), NULL), (NULL, 'Subscriber', CURRENT_TIME(), NULL)
        INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, 'Local', CURRENT_TIME(), NULL), (NULL, 'Foreign', CURRENT_TIME(), NULL)
        INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, 'Sport', NULL, NULL), (NULL, 'Business', NULL, NULL), (NULL, 'Politics', NULL, NULL), (NULL, 'Entertainment', NULL, NULL), (NULL, 'Fashion', NULL, NULL)
        */
        //factory(App\Post::class, 5)->create();

        /*
        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        }); 
        */ }
}
