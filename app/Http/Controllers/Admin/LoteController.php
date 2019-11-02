<?php

namespace App\Http\Controllers\Admin;

use App\Lote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = new Lote();
        $listarLotes = $lotes->listarLotes();

        return view('admin/lote',['lotes' => $listarLotes]);
    }
}
