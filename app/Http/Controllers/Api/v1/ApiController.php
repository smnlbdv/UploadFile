<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function index()
    {
        $response = Image::query()->where('user_id', '=',  \auth()->id())->paginate(10);
        return response()->json([
            'status' => true,
            'data' => ImageResource::collection($response),
        ]);
    }
}
