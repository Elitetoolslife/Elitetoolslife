<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Store a newly created ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Get the subject and encode the message
        $subject = $request->input('subject');
        $message = base64_encode($request->input('message'));
        $date = now();

        // Create a new ticket instance
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
            'resellers' => '', // Add your reseller logic here
            'price' => 1,
            'refunded' => 'Not Yet!',
            'fmemo' => $message,
            'seen' => 0,
            'lastreply' => $user->id,
            'lastup' => $date,
        ]);

        // Save the ticket to the database
        $ticket->save();

        // Redirect to the tickets index page with a success message
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully!');
    }
}