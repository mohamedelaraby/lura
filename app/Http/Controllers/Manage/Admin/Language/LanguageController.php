<?php

namespace App\Http\Controllers\Manage\Admin\Language;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     *  Display all languages
     *
     * @return Response
     */
    public function index(){
       $languages =  Language::languageSelect()->paginate(PAGINATION_COUNT);
        return view('admin.languages.index',compact('languages'));
    }

    /**
     *  Display all languages
     *
     * @return Response
     */
    public function create(){
       $language = new Language();
        return view('admin.languages.create',compact('language'));
    }

    /**
     *  Display all languages
     *
     * @return Response
     */
    public function store(){
      
    }
}
