<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Auth;
use Carbon\Carbon;

class ReplyController extends Controller
{
    /**
     * Handle the reply to a ticket.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addReply(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $reply = $request->input('Reply');
        
        if (empty($reply)) {
            return response("01", 400);
        }

        $ticket = Ticket::where('id', $id)->where('user_id', $userId)->first();

        if ($ticket && $ticket->status == 1) {
            $message = $this->formatMessage($reply, $userId);

            $ticket->update([
                'memo' => $ticket->memo . $message,
                'seen' => 0,
                'lastreply' => $userId,
                'lastup' => Carbon::now(),
            ]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Format the reply message.
     *
     * @param string $reply
     * @param int $userId
     * @return string
     */
    private function formatMessage($reply, $userId)
    {
        return '
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="ticket">' . htmlspecialchars($reply) . '</div>
                </div>
                <div class="panel-footer">
                    <div class="label label-info">' . $userId . '</div> - ' . Carbon::now()->format('d/m/Y h:i:s a') . '
                </div>
            </div>';
    }
}