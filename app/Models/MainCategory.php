<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    /**
     *  table name
     *
     * @param string
    */
    protected $table = 'main_categories';

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
     *  Select some attrebuties
     *
     *  @param mixed $query
     * @return Response
     */
    public function scopeMainCategorySelection($query){
        return $query->select('id','translation_lang','name','slug','photo','active');
    }

    /*****[ End Model Scopes ] ******/


      /*****[ Start attributes ] ******/

    /**
     *  Change Active attributes name
     *
     *  @return void
     */
    public function getActive(){
        return  $this->active  ? trans('auth.enabled') : trans('auth.disabled');
      }
      /*****[ End attributes ] ******/

}
