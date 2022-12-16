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
        ->orderByDesc('ngayDang')
        ->where('noiBat',1)
        ->limit(5)->get();
        // dd($sidebarNews);
        \View::share('sidebarNews',$sidebarNews);
    }
}
