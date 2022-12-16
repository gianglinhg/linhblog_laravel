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
        $query = \DB::table('loaitin')->where('anHien', '=', 1)->orderBy('thuTu');
        $loaitin = $query->limit(8)->get();
        $Allloaitin = $query->get();
        \View::share([
            'sidebarNews' => $sidebarNews,
            'loaitin' =>  $loaitin,
            'Allloaitin' =>  $Allloaitin
        ]);
    }
}
