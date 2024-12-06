Refactor to laravel <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;

class BalanceController extends Controller
{

    public function addBalance(Request $request)
    {
        $this->validate($request, [
            'methodpay' => 'required|string',
            'amount' => 'required|numeric|min:5'
        ]);

        $method = $request->input('methodpay');
        $amount = $request->input('amount');

        if ($method == "BitcoinPayment" && $amount < 5) {
            return response()->json(['error' => 'Minimum amount for Bitcoin payment is $5']);
        } elseif ($method == "PerfectMoneyPayment" && $amount < 10) {
            return response()->json(['error' => 'Minimum amount for Perfect Money payment is $10']);
        }

        $response = Http::get('https://blockchain.info/ticker');
        $usdprice = $response->json()['USD']['last'];
        $btcamount = number_format($amount / $usdprice, 8, '.', '');

        $payment = new Payment();
        $payment->user = auth()->user()->id;
        $payment->method = $method;
        $payment->amount = $btcamount;
        $payment->amountusd = $amount;
        $payment->address = $this->getNewBitcoinAddress();
        $payment->p_data = md5(mt_rand());
        $payment->state = 'pending';
        $payment->date = now();
        $payment->save();

        return response()->json(['success' => true, 'data' => $payment->p_data]);
    }

    private function getNewBitcoinAddress()
    {
        $apikey = "1c84-7e22-51e0-0a64";
        $label = auth()->user()->id . '-' . time();
        $response = Http::get("https://block.io/api/v2/get_new_address/?api_key=$apikey&label=$label");
        return $response->json()['data']['address'];
    }
}
