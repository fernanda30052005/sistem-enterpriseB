<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Promotion;
use App\Models\SendPromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CRMController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $promotions = Promotion::all();
        return view('admin.crm.send_promotion', compact('customers', 'promotions'));
    }

    public function sendPromotion(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'promotion_id' => 'required|exists:promotions,id',
        ]);

        $customer = Customer::find($request->customer_id);
        $promotion = Promotion::find($request->promotion_id);

        // Simpan promosi yang dikirim
        SendPromotion::create([
            'customer_id' => $customer->id,
            'promotion_id' => $promotion->id,
        ]);

        // Kirim Email
        Mail::raw($promotion->description, function ($message) use ($customer, $promotion) {
            $message->to($customer->email)
                    ->subject($promotion->title);
        });

        return back()->with('success', 'Promotion sent successfully!');
    }
}

