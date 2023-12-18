<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Models\User;

use Illuminate\Contracts\Session\Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Models\Sitesettings;

// use App\Models\Admin;

class CommonProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         View::composer('*', function ($view) {
            // frontend session user
            // $site_settings = Sitesettings::find(1);
            if (Auth::check()) {
                $user_id = Auth::user()->id;        
                $dataFromDatabase = User::find($user_id); // Adjust the column name to match your database            
                $view->with([                
                    'userData' => $dataFromDatabase,
                ]);

                // $admin_id = Auth::admin()->id;        
                // dd($admin_id);
                // $admindataFromDatabase = Admin::find($admin_id); // Adjust the column name to match your database            
                // $view->with([                
                //     'adminDataFromDatabase' => $admindataFromDatabase,
                // ]);
            }

            // $view->with([                
            //     'siteSettings' => $site_settings,
            // ]);
        });
    }
}