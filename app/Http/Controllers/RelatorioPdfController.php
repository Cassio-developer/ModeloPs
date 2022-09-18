<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use App\Cadastropessoass;


class RelatorioPdfController extends Controller
{
    public function nameMethod()
    {      
        $protocolo = Cadastropessoass::all();

        $pdf = PDF::loadView('pdf.index', compact('protocolo'));

        return $pdf->setPaper('a4')->download('relatorio.pdf');
    }

}
      
   