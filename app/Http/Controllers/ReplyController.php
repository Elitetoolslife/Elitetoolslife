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
        $user_id = Auth::user()->id;
        $rep = $request->input('Reply');
        
        if (empty($report)) {
            return response("01", 400);
        }

        $ticket = Ticket::where('id', $id)->where('user_id', $user_id)->first();

        if ($ticket && $ticket->status == 1) {
            $msg = '
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="ticket">' . htmlspecialchars($report) . '</div>
                    </div>
                    <div class="panel-footer">
                        <div class="label label-info">' . $user_id . '</div> - ' . Carbon::now()->format('d/m/Y h:i:s a') . '
                    </div>
                </div>';

            $ticket->update([
                'memo' => $ticket->memo . $msg,
                'seen' => 0,
                'lastreply' => $user_id,
                'lastup' => Carbon::now(),
            ]);
        }

        return response()->json(['success' => true]);
    }
}