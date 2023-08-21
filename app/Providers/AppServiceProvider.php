<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191);
        Blade::directive('format_amount', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });

        Carbon::setLocale(config('app.locale'));
    }
}
