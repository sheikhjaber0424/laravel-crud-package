<?php

namespace Jaber0424\Jaber0424CrudPackage;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class  CrudServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../stubs/Models/Article.php' => app_path('Models/Article.php'),
            __DIR__ . '/../stubs/migrations/create_articles_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . 'create_articles_table.php'),
            __DIR__ . '/../stubs/Controllers/ArticleController.php' => app_path('Http/Controllers/Api/ArticleController.php'),
            // __DIR__ . '/../stubs/Resources/UserResource.php' => app_path('Http/Resources/UserResource.php'),
            // __DIR__ . '/../stubs/routes/crud.php' => base_path('routes/api.php'),
        ], 'jaber2424-crud-package');

        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        Route::group([
            'prefix' => 'api',
            'middleware' => 'api',
        ], function () {
            Route::apiResource('articles', \App\Http\Controllers\Api\ArticleController::class);
        });
    }
}
