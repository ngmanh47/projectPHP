<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listLanguage extends Controller
{
    var $listLang = ['vi', 'en'];

    public function changeLang($language)
    {
        // check exists language in system: Kiểm tra tồn tại ngôn ngữ
        if(in_array($language, $this->listLang)){
            session(['language' => $language]);
        }
        return redirect()->route('home');
    }
}