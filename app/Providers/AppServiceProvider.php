<?php

namespace App\Providers;

use App\Category;
use App\Type;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $category = Category::all();
        $type = Type::all();
        $post_type_cat = [
            'type' => $type,
            'category' => $category
        ];

        // Sharing is caring
        View::share('post_type_cat', $post_type_cat);
    }
}
