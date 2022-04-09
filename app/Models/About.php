<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'photo', 'title_en', 'description_en',
    ];

    public function getTitle()
    {
        // check if locale is en if so, return title_en  else return title
        if (app()->getLocale() == 'en') {
            return $this->title_en;
        } else {
            return $this->title;
        }
    }

    public function getDescription()
    {
        // check if locale is en if so, return description_en  else return description
        if (app()->getLocale() == 'en') {
            return $this->description_en;
        } else {
            return $this->description;
        }
    }

}
