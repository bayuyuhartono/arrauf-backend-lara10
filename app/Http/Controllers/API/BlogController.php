<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Blog;

class BlogController extends BaseController
{
    public function page(Request $request, $code): JsonResponse
    {
        $data = Blog::getBlogPage($code);

        if (empty($data)) {
            return $this->sendError('data not found');
        }

        return $this->sendResponse($data, 'get data success');
    }

    public function newsLists(): JsonResponse
    {
        $data = Blog::getBlogNewsLists();

        if (empty($data)) {
            return $this->sendError('data not found');
        }

        foreach ($data as $key => $value) {
            $value->tags = array_map('trim', explode(',', $value->tags));
        }

        return $this->sendResponse($data, 'get data success');
    }

    public function news(Request $request, $slug): JsonResponse
    {
        $data = Blog::getBlogNews($slug);

        if (empty($data)) {
            return $this->sendError('data not found');
        }

        $data->tags = array_map('trim', explode(',', $data->tags));

        return $this->sendResponse($data, 'get data success');
    }
}
