<?php

namespace App\Providers;


use App\Http\Repositories\CostRepository;
use App\Http\Repositories\CostRepositoryInterface;
use App\Http\Repositories\ProfitRepository;
use App\Http\Repositories\ProfitRepositoryInterface;
use App\Http\Services\CategoryService;
use App\Http\Services\CategoryServiceInterface;
use App\Http\Services\CostService;
use App\Http\Services\CostServiceInterface;
use App\Http\Services\ProfitService;
use App\Http\Services\ProfitServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProfitServiceInterface::class, ProfitService::class);
        $this->app->bind(CostServiceInterface::class, CostService::class);
        $this->app->bind(ProfitRepositoryInterface::class, ProfitRepository::class);
        $this->app->bind(CostRepositoryInterface::class, CostRepository::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
