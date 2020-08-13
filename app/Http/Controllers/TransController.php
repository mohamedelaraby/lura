<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransController extends Controller
{
    /**
     *  Translation
     *
     * @return Response
     */
    public function locale($locale){

            $this->isLocaleSession();
            $locale = $this->isLocaleSessionInArray($locale);
            return back();
    }

    /**
     *  Get locale session
     *
     * @return session
     */
    protected function isLocaleSession(){
        return session()->has('locale')? session()->forget('locale') : '';
    }

    /**
     *  Is locale session In Given array
     *
     * @return session
     */
    protected function isLocaleSessionInArray($locale){
        return in_array($locale, ['ar','en']) ?  session()->put('locale', $locale):session()->put('locale', '');
    }
}
