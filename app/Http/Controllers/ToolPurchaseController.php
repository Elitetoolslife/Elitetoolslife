<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Purchase;
use App\Models\Reseller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ToolPurchaseController extends Controller
{
    public function buyTool(Request $request)
    {
        $user = Auth::user();
        $tool = Tool::find($request->id);

        if ($user->balance >= $tool->price) {
            $user->decrement('balance', $tool->price);
            $user->increment('ipurchassed');

            $tool->update([
                'sold' => 1,
                'sto' => $user->username,
                'dateofsold' => now(),
            ]);

            Purchase::create([
                's_id' => $tool->id,
                'buyer' => $user->username,
                'type' => $tool->acctype,
                'date' => now(),
                'country' => $tool->country,
                'infos' => $tool->infos,
                'url' => $tool->url,
                'login' => $tool->login,
                'pass' => $tool->pass,
                'price' => $tool->price,
                'reseller' => $tool->reseller,
            ]);

            return redirect()->route('order.show', ['id' => $tool->id]);
        } else {
            return redirect()->back()->with('error', 'Please top-up your balance to buy.');
        }
    }
}