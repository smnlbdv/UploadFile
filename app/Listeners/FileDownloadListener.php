<?php

namespace App\Listeners;

use App\Events\FileDownload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FileDownloadListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\FileDownload  $event
     * @return void
     */
    public function handle(FileDownload $event)
    {
        return $event;
    }
}
