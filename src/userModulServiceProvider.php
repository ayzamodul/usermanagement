<?php

namespace modul\userModul;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class  userModulServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/views', 'kullanici');

        $data = [
            'baslik' => 'Kullanicilar',
            'url' => '/yonetim/kullanici',
            'aktif_mi' => 1
        ];
        $count = DB::table('moduller')->where('Baslik', 'Kullanicilar')->count();
        if ($count == 0) {
            DB::table('moduller')->insert($data);
        } else {
            return false;
        }



    }

    public function register()
    {

    }
}
