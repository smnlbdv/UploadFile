<?php
namespace App\Facades;
use App\Services\imgOperationsService;
use Illuminate\Support\Facades\Facade;

class ImgOperationsFacade extends Facade{
    protected static function getFacadeAccessor(): string
    {
        return imgOperationsService::class;
    }
}
