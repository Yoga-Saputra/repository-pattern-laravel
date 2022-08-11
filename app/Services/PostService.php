<?php

namespace App\Services;

use App\Helpers\ApiResponse;
use App\Helpers\ResponseCode;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Validator;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function getAllPostService()
    {
        return $this->postRepository->getAllPostRepository();
    }

    public function storeService($data)
    {
        $validator =  Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponse::instance()->apiResponse(false, "Data tidak valid", $validator->errors(), '', ResponseCode::$_BAD_REQUEST);
        }

        return  $this->postRepository->savePostRepository($data);
    }
}
