<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\Info_Page;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $produtos_ativos = Produtos::where('status_db', 1)->where('status', 1)->count();
            $produtos = Produtos::where('status_db', 1)->count();
            $cursos_ativos = Cursos::where('status_db', 1)->where('status', 1)->count();
            $cursos = Cursos::where('status_db', 1)->count();
            $info_pages = Info_Page::get()->first();
            return view('admin.home', compact('produtos_ativos', 'produtos', 'cursos_ativos', 'cursos', 'info_pages'));
        }
        return redirect()->route('login');
    }

}
