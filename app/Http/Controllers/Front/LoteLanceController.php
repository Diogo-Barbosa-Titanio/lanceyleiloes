<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\LotesLances;
use Illuminate\Http\Request;

class LoteLanceController extends Controller
{

    public function maiorLance(Request $request)
    {
        $id_lote = $request->get('id_lote');

        $lances = new LotesLances();

        return $lances->maiorLance($id_lote);

    }

}
