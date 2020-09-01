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

            show_message('error',trans('auth.language_add_failed'));

            return redirect()->route('admin.languages');
        }
    }


    /**
     *  Display update element view
     *
     *  @param  mixed $id
     */
    public function edit($id){
        $language = Language::select()->find($id);
        if(!$language){
            show_message('error',trans('auth.language_not_found'));
            return redirect()->route('admin.languages');
        }



        return view('admin.languages.edit',compact('language'));
    }

    /**
     *  Update existing language
     *
     *  @param  Response $request
     *  @param  mixed $id
     */
    public function update(LanguageRequest $request,$id){
        try{
            $language = Language::find($id);
            if(!$language){
                show_message('error',trans('auth.language_add_failed'));
                return redirect()->route('admin.languages.edit',$id);
            }

        //Update language
        $language->update($request->except("_token"));
        show_message('msg',trans('auth.language_update_success'));
        return redirect()->route('admin.languages');

        } catch (Exception $exception){
                show_message('error',trans('auth.language_add_failed'));
                return redirect()->route('admin.languages');
        }
    }

    /**
     *  Delete existing language
     *
     *  @param  Response $request
     *  @param  mixed $id
     */
    public function delete($id){
        try{
            $language = Language::find($id);
            if(!$language){
                show_message('error',trans('auth.language_delete_failed'));
                return redirect()->route('admin.languages');
            }

        //Update language
        $language->delete();
        show_message('msg',trans('auth.language_delete_success'));
        return redirect()->route('admin.languages');

        } catch (Exception $exception){
                show_message('error',trans('auth.language_add_failed'));
                return redirect()->route('admin.languages');
        }
    }

}
