<?php

namespace App\Jobs;

use App\Facades\ImgOperationsFacade;
use App\Models\GroupImage;
use App\Models\ImageToZip;
use App\Models\Zip;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ImageOperationsJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    public $tries = 3;
    protected $zip;
    protected $zip_name;
    protected $path;
    protected $extension;
    protected $image;
    protected $group;
    protected $zipArchive;
    protected $width;
    protected $height;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($zip, $zip_name, $path, $extension, $group, $zipArchive, $width, $height)
    {
        $this->zip = $zip;
        $this->zip_name = $zip_name;
        $this->path = $path;
        $this->extension = $extension;
        $this->group = $group;
        $this->zipArchive = $zipArchive;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->zip->open(storage_path('app/public/zipArchives/' . $this->zip_name), \ZipArchive::CREATE)) {
            throw new \InvalidArgumentException('Не удалось открыть архив');
        }

        foreach (File::files(Storage::path($this->path)) as $file) {
            $relationName = basename($file);
            $this->zip->addFile($file,
                is_null($this->extension) ? $relationName : pathinfo($relationName, PATHINFO_FILENAME) . '.' . $this->extension);
            $imagick = new \Imagick(storage_path('app' . '/' . $this->path . '/' . $relationName));
            if (isset($this->width) && isset($this->height)) {
                $imagick->adaptiveResizeImage($this->width, $this->height);
            }
            $imagick->setCompression(\Imagick::COMPRESSION_JPEG);
            $imagick->setImageCompressionQuality(30);
            $imagick->writeImage(storage_path('app' . '/' . $this->path . '/' . $relationName));
        }

        $this->group->update([
            'zip_id' => $this->zipArchive['id'],
        ]);
    }
}
