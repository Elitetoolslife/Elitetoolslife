<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Report;
use App\Models\User;
use App\Models\Rdp;
use App\Models\Stuff;
use App\Models\Cpanel;
use App\Models\Mailer;
use App\Models\Smtp;
use App\Models\Lead;
use App\Models\Account;
use App\Models\Bank;
use App\Models\Scampage;
use App\Models\Tutorial;

class indexController extends Controller
{
    public function index()
    {
        $usrid = auth()->user()->id;
        $tickets = Ticket::where('status', 1)->where('uid', $usrid)->count();
        $reports = Report::where('status', 1)->where('uid', $usrid)->count();
        $balance = User::where('id', $usrid)->value('balance');
        $rdps = Rdp::where('sold', 0)->count();
        $shells = Stuff::where('sold', 0)->count();
        $cpanels = Cpanel::where('sold', 0)->count();
        $mailers = Mailer::where('sold', 0)->count();
        $smtps = Smtp::where('sold', 0)->count();
        $leads = Lead::where('sold', 0)->count();
        $premiums = Account::where('sold', 0)->count();
        $banks = Bank::where('sold', 0)->count();
        $scams = Scampage::count();
        $tutorials = Tutorial::count();

        $user = User::find($usrid);
        $seller = $user->resseller == 1 ? $user->seller->soldb : null;

        $data = [
            'tickets' => $tickets,
            'reports' => $reports,
            'balance' => $balance,
            'rdp' => $rdps,
            'shell' => $shells,
            'cpanel' => $cpanels,
            'mailer' => $mailers,
            'smtp' => $smtps,
            'leads' => $leads,
            'premium' => $premiums,
            'banks' => $banks,
            'scams' => $scams,
            'tutorials' => $tutorials,
            'seller' => $seller,
        ];

        return response()->json($data);
    }
}