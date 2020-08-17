<?php

namespace App\Http\Controllers\Manage\Admin\Language;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Exception;
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
     *  Display create language form
     *
     * @return void
     */
    public function create(){
       $language = new Language();
        return view('admin.languages.create',compact('language'));
    }

    /**
     *  Create new language
     *
     * @param mixed $request
     * @return Response
     */
    public function store(LanguageRequest $request ){
        // Create new language
        try{
            Language::create($request->except(['_token']));

            show_message('msg',trans('auth.language_add_success'));

            return redirect()->route('admin.languages');
        } catch (Exception $exception){

            show_message('msg',trans('auth.language_add_failed'));

            return redirect()->route('admin.languages');
        }
        //return to language page
        // Handle errors and exceptiona
    }
}
