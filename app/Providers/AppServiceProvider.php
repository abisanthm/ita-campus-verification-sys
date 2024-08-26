<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Value;
use App\Models\CertificateSetting;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        $settingComposer = function ($view) {
            $settings = Setting::findOrFail(1);
            $view->with('setting', $settings);
        };




        // Target multiple views using a wildcard pattern
        View::composer(['layouts.nav',
                        'layouts.app',
                        'layouts.auth',
                        'dashboard',
                        'modules.verify.index',
                        'modules.verify.show',
                        'modules.verify.invalid',

                    ], $settingComposer);


                    
                             
                    if(Storage::disk('local')->exists('installed'))
                    {
                        $value = Value::pluck('custom_name', 'field_name')->toArray();
                        config(['field_name' => $value]);

                        $cs_value = CertificateSetting::findOrFail(1);
                        config(['cer_setting' =>$cs_value]);

                    } 

    }
}
