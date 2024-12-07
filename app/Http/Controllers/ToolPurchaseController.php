 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Purchase;
use App\Models\Reseller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ToolPurchaseController extends Controller
{
    public function buyTool(Request $request)
    {
        $user = Auth::user();
        $tool = Tool::find($request->id);

        if ($user->balance >= $tool->price) {
            DB::transaction(function () use ($user, $tool) {
                $user->balance -= $tool->price;
                $user->ipurchassed += 1;
                $user->save();

                $tool->sold = 1;
                $tool->sto = $user->username;
                $tool->dateofsold = now();
                $tool->save();

                $purchase = new Purchase();
                $purchase->s_id = $tool->id;
                $purchase->buyer = $user->username;
                $purchase->type = $tool->acctype;
                $purchase->date = now();
                $purchase->country = $tool->country;
                $purchase->infos = $tool->infos;
                $purchase->url = $tool->url;
                $purchase->login = $tool->login;
                $purchase->pass = $tool->pass;
                $purchase->price = $tool->price;
                $purchase->reseller = $tool->reseller;
                $purchase->save();
            });

            return redirect()->route('order.show', ['id' => $tool->id]);
        } else {
            return redirect()->back()->with('error', 'Please top-up your balance to buy.');
        }
    }
}