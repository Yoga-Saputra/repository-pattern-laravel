<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Helpers\ResponseCode;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository) {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        try {
            return ApiResponse::instance()->apiResponse(true, 'Berhasil', '', $this->contactRepository->getAllContactRepositories(), ResponseCode::$_OK);
        } catch (\Exception $e) {
            return ApiResponse::instance()->apiResponse(false, $e->getMessage(), '', '', ResponseCode::$_BAD_REQUEST);
        }

    }

    public function show($id)
    {
        try {
            return ApiResponse::instance()->apiResponse(true, 'Berhasil', '', $this->contactRepository->findContactByIdRepository($id), ResponseCode::$_OK);
        } catch (\Exception $e) {
            return ApiResponse::instance()->apiResponse(false, $e->getMessage(), '', '', ResponseCode::$_BAD_REQUEST);
        }
    }
}
