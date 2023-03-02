<?php

namespace App\Http\Controllers;


use App\Enums\RoleEnum;
use App\Events\FileDownload;
use App\Facades\ImgOperationsFacade;
use App\Http\Requests\ImgRequest;
use App\Jobs\ImageOperationsJob;
use App\Models\GroupImage;
use App\Models\Image;
use App\Models\ImageToZip;
use App\Models\Zip;
use App\Services\imgOperationsService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ImageOperationsController extends Controller
{
    public function index(){

        return view('service.index');
    }

    public function store(ImgRequest $request)
    {
        $path = 'images/' . rand(0, 1000) . Str::random(10);
        $extension = $request->extension;
        $width = $request->width;
        $height = $request->height;

        $zip = new \ZipArchive();
        $zip_name = rand(0, 1000) . Str::random(10) . '.zip';


        $group = GroupImage::query()->create([
            'group_name' => str_replace('images/', '', $path),
        ]);

        foreach ($request->file('image', []) as $key => $image) {
            $name = rand(0, 1000) . Str::random(10);
            Storage::putFileAs($path, $image, $name . '.' . $image->extension());
            $image = Image::query()->create([
                'name' => pathinfo($name, PATHINFO_FILENAME),
                'width' => $width,
                'height' => $height,
                'type' => $image->extension(),
                'file' => pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),
                'user_id' => Auth::id(),
                'group_id' => $group['id'],
            ]);
        }

        $zipArchive = Zip::query()->create([
            'name' => pathinfo($zip_name, PATHINFO_FILENAME),
            'user_id' => Auth::id(),
        ]);

        ImageOperationsJob::dispatch($zip, $zip_name, $path, $extension, $group, $zipArchive, $width, $height);

        $imageToZip = ImageToZip::query()->create([
            'image_id' => $image->id,
            'zip_id' => $zipArchive->id
        ]);

        return redirect()->route('zip');

    }
    public function zip(){
        $zip = Zip::query()->where('user_id', Auth::id())->get();
        return view('zip', compact('zip'));
    }
}
