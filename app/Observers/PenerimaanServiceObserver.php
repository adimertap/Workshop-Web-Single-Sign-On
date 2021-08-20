<?php

namespace App\Observers;

use App\Model\Service\PenerimaanService;
use App\Notifications\NewOrderService;

class PenerimaanServiceObserver
{
    /**
     * Handle the penerimaan service "created" event.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return void
     */
    public function created(PenerimaanService $penerimaanService)
    {
        $penerimaanService->notify(new NewOrderService());
    }

    /**
     * Handle the penerimaan service "updated" event.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return void
     */
    public function updated(PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Handle the penerimaan service "deleted" event.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return void
     */
    public function deleted(PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Handle the penerimaan service "restored" event.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return void
     */
    public function restored(PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Handle the penerimaan service "force deleted" event.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return void
     */
    public function forceDeleted(PenerimaanService $penerimaanService)
    {
        //
    }
}
