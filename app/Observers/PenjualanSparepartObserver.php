<?php

namespace App\Observers;

use App\Model\FrontOffice\PenjualanSparepart;
use App\Notifications\NewOrderSparepart;

class PenjualanSparepartObserver
{
    /**
     * Handle the penjualan sparepart "created" event.
     *
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return void
     */
    public function created(PenjualanSparepart $penjualanSparepart)
    {
        $penjualanSparepart->notify(new NewOrderSparepart());
    }

    /**
     * Handle the penjualan sparepart "updated" event.
     *
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return void
     */
    public function updated(PenjualanSparepart $penjualanSparepart)
    {
    }

    /**
     * Handle the penjualan sparepart "deleted" event.
     *
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return void
     */
    public function deleted(PenjualanSparepart $penjualanSparepart)
    {
    }

    /**
     * Handle the penjualan sparepart "restored" event.
     *
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return void
     */
    public function restored(PenjualanSparepart $penjualanSparepart)
    {
        //
    }

    /**
     * Handle the penjualan sparepart "force deleted" event.
     *
     * @param  \App\PenjualanSparepart  $penjualanSparepart
     * @return void
     */
    public function forceDeleted(PenjualanSparepart $penjualanSparepart)
    {
        //
    }
}
