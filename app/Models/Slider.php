<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',  'photo','description', 'description_en', 'name_en', 
    ];

    public function getName()
    {
        // check if locale is en if so, return name_en  else return name
        if (app()->getLocale() == 'en') {
            return $this->name_en;
        } else {
            return $this->name;
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
