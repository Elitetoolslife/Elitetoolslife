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
    /**
     * Handle the tool purchase process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buyTool(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Find the tool by its ID from the request
        $tool = Tool::find($request->id);

        // Check if the user has enough balance to buy the tool
        if ($user->balance >= $tool->price) {
            // Decrease the user's balance by the tool price
            $user->decrement('balance', $tool->price);
            
            // Increase the user's purchase count
            $user->increment('ipurchassed');

            // Update the tool's details to mark it as sold
            $tool->update([
                'sold' => 1,
                'sto' => $user->username,
                'dateofsold' => now(),
            ]);

            // Create a new purchase record
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

            // Redirect to the order details page
            return redirect()->route('order.show', ['id' => $tool->id]);
        } else {
            // Redirect back with an error message if the balance is insufficient
            return redirect()->back()->with('error', 'Please top-up your balance to buy.');
        }
    }
}