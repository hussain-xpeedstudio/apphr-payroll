<?php
namespace AppHr\Payroll;
use Illuminate\Support\ServiceProvider;
class PayrollServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
       // $this->loadAPIResources(__DIR__.'/routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/Models' => app_path('Models/Payroll'),
        ]);
    }
    public function register(){
    }
}
