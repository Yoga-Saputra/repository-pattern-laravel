<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Helpers\ResponseCode;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index()
    {
        try {
            return ApiResponse::instance()->apiResponse(true, 'Berhasil', '', $this->postService->getAllPostService(), ResponseCode::$_OK);
        } catch (\Exception $e) {
            return ApiResponse::instance()->apiResponse(false, $e->getMessage(), '', '', ResponseCode::$_BAD_REQUEST);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'title',
                'description'
            ]);

            $result = $this->postService->storeService($data);
            return ApiResponse::instance()->apiResponse(true, 'Berhasil', '', $result, ResponseCode::$_CREATED);
        } catch (\Exception $e) {
            return ApiResponse::instance()->apiResponse(false, $e->getMessage(), '', '', ResponseCode::$_BAD_REQUEST);
        }
    }
}
