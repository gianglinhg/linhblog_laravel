<?php

namespace App\Providers;

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
        $sidebarNews = \DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten')
        ->limit(5)->inRandomOrder()->get();
        $query = \DB::table('loaitin')->orderBy('thuTu','asc')->limit(8)->get();
        \View::share([
            'sidebarNews' => $sidebarNews,
            'loaitin' =>  $loaitin,
        ]);
    }
}
