<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\Cms;
use App\Models\Gallery;

class CmsController extends BaseController
{
    public function home(): JsonResponse
    {
        $data['wallpaper'] = Cms::getWallpaper();
        $data['quote'] = Cms::getQuote();
        $data['motto'] = Cms::getMottoList();
        $data['benefit'] = Cms::getBenefitList();
        $data['ppdb'] = Cms::getPpdb();
        $data['testimoni'] = Cms::getTestimoniList();
        $data['schoolactivity'] = Gallery::getGalleryList('SCHOOLACTIVITY', 9);
        $data['ekstrakulikuler'] = Gallery::getGalleryList('EKSTRAKULIKULER', 3);

        return $this->sendResponse($data, 'get data success');
    }

    public function contact(): JsonResponse
    {
        $data = Cms::getContact();

        return $this->sendResponse($data, 'get data success');
    }

    public function ppdb(): JsonResponse
    {
        $data = Cms::getPpdb();

        return $this->sendResponse($data, 'get data success');
    }
}
