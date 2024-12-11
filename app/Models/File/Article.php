<?php

namespace App\Models\File;

use App\Traits\Fileable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Fileable;

    protected $guarded = [];

    public function lang()
    {
        $arr = [
            'uz' => "O'zbek tili",
            'ru' => "Rus tili",
            'en' => "Ingliz tili",
        ];

        return $arr[$this->lang];
    }
}
