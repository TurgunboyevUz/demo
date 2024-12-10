<?php

namespace App\Http\Controllers\Student;

use App\Facade\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreAchievementRequest;
use App\Http\Requests\Student\StoreArticleRequest;
use App\Http\Requests\Student\StoreDistinguishedScholarshipRequest;
use App\Http\Requests\Student\StoreGrandEconomyRequest;
use App\Http\Requests\Student\StoreInventionRequest;
use App\Http\Requests\Student\StoreLangCertificateRequest;
use App\Http\Requests\Student\StoreOlympicRequest;
use App\Http\Requests\Student\StoreScholarshipRequest;
use App\Http\Requests\Student\StoreStartupRequest;

class FileController extends Controller
{
    public function article(StoreArticleRequest $request)
    {
        File::user($request)->article($request);

        return redirect()->route($request->route()->getName());
    }

    public function scholarship(StoreScholarshipRequest $request)
    {
        File::user($request)->scholarship($request);

        return redirect()->route($request->route()->getName());
    }

    public function invention(StoreInventionRequest $request)
    {
        File::user($request)->invention($request);

        return redirect()->route($request->route()->getName());
    }

    public function startup(StoreStartupRequest $request)
    {
        File::user($request)->startup($request);

        return redirect()->route($request->route()->getName());
    }

    public function grand_economy(StoreGrandEconomyRequest $request)
    {
        File::user($request)->grand_economy($request);

        return redirect()->route($request->route()->getName());
    }

    public function olympics(StoreOlympicRequest $request)
    {
        File::user($request)->olympics($request);

        return redirect()->route($request->route()->getName());
    }

    public function lang_certificate(StoreLangCertificateRequest $request)
    {
        File::user($request)->lang_certificate($request);

        return redirect()->route($request->route()->getName());
    }

    public function distinguished_scholarship(StoreDistinguishedScholarshipRequest $request)
    {
        File::user($request)->distinguished_scholarship($request);

        return redirect()->route($request->route()->getName());
    }

    public function achievement(StoreAchievementRequest $request)
    {
        File::user($request)->achievement($request);

        return redirect()->route($request->route()->getName());
    }
}