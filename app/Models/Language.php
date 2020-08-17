<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     *  table name
     *
     * @param string
    */
    protected $table = 'languages';

    /**
     *  The attributes which to be guarded
     *
     * @return array
     */
    protected $guarded = [];

    /*****[ Start Model Scopes ] ******/

    /**
     *  Find active categories
     *
     * @param mixed $query
     * @return Response
     */
    public function scopeActive($query){
        return $query->where('active',1);
    }

    /**
     *  Select all languages
     *
     * @param mixed $query
     * @return Response
     */
    public function scopeLanguageSelect($query){
        return $query->select('abbreviation','name','direction','active');
    }

    /*****[ End Model Scopes ] ******/

    /*****[ Start attributes ] ******/

    /**
     *  Change Active attributes name
     *
     *  @return void
     */
    public function getActiveAttribute($value){
        return $value == 1 ? trans('auth.enabled') : trans('auth.disabled');
    }
    /*****[ End attributes ] ******/



}
