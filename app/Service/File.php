<?php

namespace App\Service;

use App\Http\Requests\Student\StoreAchievementRequest;
use App\Http\Requests\Student\StoreArticleRequest;
use App\Http\Requests\Student\StoreDistinguishedScholarshipRequest;
use App\Http\Requests\Student\StoreGrandEconomyRequest;
use App\Http\Requests\Student\StoreInventionRequest;
use App\Http\Requests\Student\StoreLangCertificateRequest;
use App\Http\Requests\Student\StoreOlympicRequest;
use App\Http\Requests\Student\StoreScholarshipRequest;
use App\Http\Requests\Student\StoreStartupRequest;
use App\Models\File\Article;
use App\Models\File\Invention;
use App\Models\File\Scholarship;
use App\Models\File\Startup;
use App\Models\User;
use Illuminate\Http\Request;

class File
{
    protected $request;
    protected $user;

    public function __construct()
    {}

    public function user(Request $request)
    {
        $this->request = $request;
        $this->user = $request->user();

        return $this;
    }

    public function article(StoreArticleRequest $request)
    {
        $data = $request->validated();

        $article = new Article();
        $article->user_id = $this->user->id;
        $article->criteria_id = $data['criteria_id'];
        $article->title = $data['title'];
        $article->keywords = $data['keywords'];
        $article->lang = $data['lang'];
        $article->authors_count = $data['authors_count'];
        $article->authors = $data['authors'];
        $article->doi = $data['doi'];
        $article->journal_name = $data['journal_name'];
        $article->publish_params = $data['publish_params'];
        $article->international_databases = $data['international_databases'];
        $article->published_year = $data['published_year'];
        $article->education_year = $data['education_year'];
        $article->save();

        $article->upload_file($request, 'articles');

        return $article;
    }

    public function scholarship(StoreScholarshipRequest $request)
    {
        $data = $request->validated();

        $scholarship = new Scholarship();
        $scholarship->user_id = $this->user->id;
        $scholarship->criteria_id = $data['criteria_id'];
        $scholarship->name = $data['name'];
        $scholarship->given_date = $data['given_date'];
        $scholarship->certificate_number = $data['certificate_number'];
        $scholarship->save();
        
        $scholarship->upload_file($request, 'scholarships');

        return $scholarship;
    }

    public function invention(StoreInventionRequest $request)
    {
        $data = $request->validated();

        $invention = new Invention();

        $invention->user_id = $this->user->id;
        $invention->criteria_id = $data['criteria_id'];
        $invention->title = $data['title'];
        $invention->property_number = $data['property_number'];
        $invention->authors_count = $data['authors_count'];
        $invention->authors = $data['authors'];
        $invention->publish_params = $data['publish_params'];
        $invention->education_year = $data['education_year'];
        $invention->save();

        $invention->upload_file($request, 'inventions');

        return $invention;
    }

    public function startup(StoreStartupRequest $request)
    {
        $data = $request->validated();

        $startup = new Startup();

        $startup->user_id = $this->user->id;
        $startup->criteria_id = $data['criteria_id'];
        $startup->name = $data['name'];
        $startup->type = $data['type'];
        $startup->participant = $data['participant'];
        $startup->team_members = $data['team_members'];
        $startup->location = $data['location'];
        $startup->save();

        $startup->upload_file($request, 'startups');

        return $startup;
    }

    public function grand_economy(StoreGrandEconomyRequest $request)
    {
        $data = $request->validated();
    }

    public function olympics(StoreOlympicRequest $request)
    {
        $data = $request->validated();
    }

    public function lang_certificate(StoreLangCertificateRequest $request)
    {
        $data = $request->validated();
    }

    public function distinguished_scholarship(StoreDistinguishedScholarshipRequest $request)
    {
        $data = $request->validated();
    }

    public function achievement(StoreAchievementRequest $request)
    {
        $data = $request->validated();
    }
}
