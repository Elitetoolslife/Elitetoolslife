<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Auth;
use Carbon\Carbon;

class ReplyController extends Controller
{
    public function addReply(Request $request, $id)
    {
        $uid = Auth::user()->id;
        $rep = $request->input('Reply');
        
        if (empty($rep)) {
            return response("01", 400);
        }

        $ticket = Ticket::where('id', $id)->where('uid', $uid)->first();

        if ($ticket && $ticket->status == 1) {
            $msg = '
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="ticket">' . htmlspecialchars($rep) . '</div>
                    </div>
                    <div class="panel-footer">
                        <div class="label label-info">' . $uid . '</div> - ' . Carbon::now()->format('d/m/Y h:i:s a') . '
                    </div>
                </div>';

            $ticket->memo = $ticket->memo . $msg;
            $ticket->seen = 0;
            $ticket->lastreply = $uid;
            $ticket->lastup = Carbon::now();
            $ticket->save();
        }

        return response()->json(['success' => true]);
    }
}