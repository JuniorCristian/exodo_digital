<?php

namespace App\Http\Controllers;

use App\Models\Info_Page;
use Illuminate\Http\Request;

class InfoPageController extends Controller
{

    public function update(Request $request, Info_Page $info_Page)
    {
        $info_Page->phone = $request->phone;
        $info_Page->email = $request->email;
        $info_Page->street = $request->street;
        $info_Page->city = $request->city;
        $info_Page->twitter = $request->twitter;
        $info_Page->facebook = $request->facebook;
        $info_Page->youtube = $request->youtube;
        $info_Page->instagran = $request->instagran;
        $info_Page->linkedin = $request->linkedin;
        $info_Page->save();
        return redirect()->route('admin.home');
    }

    public function enviaContato()
    {

    }
}
