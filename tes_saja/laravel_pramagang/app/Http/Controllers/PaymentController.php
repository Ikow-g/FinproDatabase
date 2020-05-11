<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();

        return view('payment.index', compact('payment'));
    }

    public function add_page()
    {
        return view('payment.add');
    }

    public function store(Request $request)
    {
        if ($request->input('tambah')) {
            $payment = new Payment;
            $payment->study = $request->studi;
            $payment->nominal = $request->nominal;
            $payment->save();
            return redirect('payment.index');
        }
    }
}
