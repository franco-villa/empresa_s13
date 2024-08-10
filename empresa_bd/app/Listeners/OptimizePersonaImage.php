<?php

namespace App\Listeners;

use App\Events\PersonaSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OptimizePersonaImage implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
       
    }

    /**
     * Handle the event.
     */
    public function handle(PersonaSaved $event): void
    {
        $image= Image::make(Storage::get($event->persona->image))
            ->widen(600)
            ->limitColors(255)
            ->encode();
        
        Storage::put($event->persona->image, (string) $image);
    }
}
