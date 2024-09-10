<?php

namespace App\Providers;

use App\Interfaces\BrandInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\UserInterface;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class,UserRepository::class);
        $this->app->bind(BrandInterface::class,BrandRepository::class);
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
        $this->app->bind(ProductInterface::class,ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
