<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\NoticiasCategoria;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chartArray = [];

        /** @var NoticiasCategoria $noticias */
        $categorias = NoticiasCategoria::all();

        foreach ($categorias as $key => $categoria){
            $chartArray[] = [
                'name' => $categoria->ds_categoria,
                'y' => $categoria->noticias->count()
            ];
        }

        return view('admin.dashboard.index', compact('chartArray'));
    }
}
