<?php

namespace App\Providers;

use App\Model\FrontOffice\MasterDataMerkKendaraan;
use App\Model\FrontOffice\PenjualanSparepart;
use App\Model\Service\PenerimaanService;
use App\Observers\MerkKendaraanObserver;
use App\Observers\PenerimaanServiceObserver;
use App\Observers\PenjualanSparepartObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        PenjualanSparepart::observe(PenjualanSparepartObserver::class);
        PenerimaanService::observe(PenerimaanServiceObserver::class);
    }
}
