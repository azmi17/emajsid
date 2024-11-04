<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Language;

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
        Paginator::useBootstrap();

        $categories = Category::with('rSubCategory')->where('show_on_menu','Show')->orderBy('category_order','asc')->get();

        $setting_data = Setting::where('id',1)->first();
        $language_data = Language::get();
        $default_lang_data = Language::where('is_default','Yes')->first();

        view()->share('global_categories', $categories);
        view()->share('global_setting_data', $setting_data);
        view()->share('global_language_data', $language_data);
        view()->share('global_short_name', $default_lang_data->short_name);

    }
}
