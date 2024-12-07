<?php 

 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $user = Auth::user();
        $subject = $request->input('subject');
        $message = base64_encode($request->input('message'));
        $date = now();

        $ticket = new Ticket([
            'uid' => $user->id,
            'status' => 1,
            's_id' => $user->s_id,
            's_url' => '', // Add your URL logic here
            'memo' => $message,
            'acctype' => '', // Add your account type logic here
            'admin_r' => 0,
            'date' => $date,
            'subject' => $subject,
            'type' => 'refunding',
            'resseller' => '', // Add your reseller logic here
            'price' => 1,
            'refunded' => 'Not Yet!',
            'fmemo' => $message,
            'seen' => 0,
            'lastreply' => $user->id,
            'lastup' => $date,
        ]);

        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully!');
    }
}