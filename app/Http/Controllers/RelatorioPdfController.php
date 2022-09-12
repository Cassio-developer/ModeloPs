<?php

namespace App\Http\Controllers;
//use Barryvdh\DomPDF\Facade\Pdf;
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
      //  $pdf = Pdf::loadView('pdf.invoice', $data);
        //return $pdf->download('invoice.pdf');

        
        //$pdf = App::make('dompdf.wrapper');
    //$pdf->loadHTML('<h1>Test</h1>');
      // $products = Cadastropessoass::all();
       //$products2 = Cadastropessoass::loadView('pdf.index', $data);
       // return $pdf->download('pdf.index', compact('products','products2'));
    //return \PDF::loadView('pdf.index', compact('products'))
                    // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                  // ->save('path aqui');
    
   