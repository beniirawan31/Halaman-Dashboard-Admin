<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;

class TransaksiController extends Controller
{
    public function create()
    {
        $bukus = Buku::all();
        $events = Event::all();
        return view('checkout', compact('bukus', 'events'));
    }

    public function store(Request $request)
    {
        $items = $request->input('items');
        $checkoutItems = [];
        $grandTotal = 0;

        foreach ($items as $type => $products) {
            foreach ($products as $id => $product) {
                $jumlah = (int) $product['jumlah'];
                if ($jumlah > 0) {
                    $harga = (float) $product['harga'];
                    $subtotal = $harga * $jumlah;
                    $grandTotal += $subtotal;

                    $checkoutItems[] = [
                        'type' => $type,
                        'id' => $id,
                        'jumlah' => $jumlah,
                        'harga' => $harga,
                        'subtotal' => $subtotal,
                    ];
                }
            }
        }

        return view('checkout_summary', compact('checkoutItems', 'grandTotal'));
    }

    public function exportPdf()
    {
        $items = session('checkout_data', []);
        $total = session('total', 0);

        $pdf = FacadePdf::loadView('pdf.checkout_pdf', compact('items', 'total'));
        return $pdf->download('invoice-pembayaran.pdf');
    }
}
