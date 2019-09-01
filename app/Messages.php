<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Intervention\Image\Facades\Image;
use Laravel\Socialite\Facades\Socialite;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Watson\Sitemap\Facades\Sitemap;



class Messages extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'user_id',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
