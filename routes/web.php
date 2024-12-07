<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\HomeController;

Route::get('/index', [HomeController::class, 'index']);
Route::get('/ajaxinfo', [HomeController::class, 'ajaxinfo']);
Route::get('/mailer', [HomeController::class, 'mailer']);
Route::get('/shell', [HomeController::class, 'shell']);
Route::get('/leads', [HomeController::class, 'leads']);
Route::get('/premium', [HomeController::class, 'premium']);
Route::get('/addBalance', [HomeController::class, 'addBalance']);
Route::get('/divPage{page}', [HomeController::class, 'divPage']);
Route::get('/settingEdit', [HomeController::class, 'settingEdit']);
Route::get('/CreateTicket', [HomeController::class, 'createTicket']);
Route::get('/CreateReport', [HomeController::class, 'createReport']);
Route::get('/funds', [HomeController::class, 'funds']);
Route::get('/addBalanceAction', [HomeController::class, 'addBalanceAction']);
Route::get('/rdp', [HomeController::class, 'rdp']);
Route::get('/tutorial', [HomeController::class, 'tutorial']);
Route::get('/MakePayment', [HomeController::class, 'makePayment']);
Route::get('/BitcoinPayment', [HomeController::class, 'bitcoinPayment']);
Route::get('/banks', [HomeController::class, 'banks']);
Route::get('/PerfectMoneyPayment', [HomeController::class, 'perfectMoneyPayment']);
Route::get('/tickets', [HomeController::class, 'tickets']);
Route::get('/seller', [HomeController::class, 'seller']);
Route::get('/scampage', [HomeController::class, 'scampage']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/active', [HomeController::class, 'active']);
Route::get('/orders', [HomeController::class, 'orders']);
Route::get('/setting', [HomeController::class, 'setting']);
Route::get('/static', [HomeController::class, 'staticPage']);
Route::get('/smtp', [HomeController::class, 'smtp']);
Route::get('/AddSingleTool', [HomeController::class, 'addSingleTool']);
Route::get('/cPanel', [HomeController::class, 'cPanel']);
Route::get('/checkEmailChange', [HomeController::class, 'checkEmailChange']);
Route::get('/reports', [HomeController::class, 'reports']);
Route::get('/Rules', [HomeController::class, 'rules']);
Route::get('/account', [HomeController::class, 'account']);
Route::get('/AddCards', [HomeController::class, 'addCards']);
Route::get('/vt-{id}', [HomeController::class, 'vt']);
Route::get('/vr-{id}', [HomeController::class, 'vr']);
Route::get('/divPageticket{id}', [HomeController::class, 'divPageTicket']);
Route::get('/divPagereport{id}', [HomeController::class, 'divPageReport']);
Route::get('/showTicket{id}', [HomeController::class, 'showTicket']);
Route::get('/CheckShell{id}', [HomeController::class, 'checkShell']);
Route::get('/CheckSMTP{id}', [HomeController::class, 'checkSMTP']);
Route::get('/CheckCpanel{id}', [HomeController::class, 'checkCpanel']);
Route::get('/CheckMailer{id}', [HomeController::class, 'checkMailer']);
Route::get('/showOrder{id}', [HomeController::class, 'showOrder']);
Route::get('/addReply{id}', [HomeController::class, 'addReply']);
Route::get('/addReportReply{id}', [HomeController::class, 'addReportReply']);
Route::get('/divPagepayment{p_data}', [HomeController::class, 'divPagePayment']);
Route::get('/Check', [HomeController::class, 'check']);
Route::get('/PMCheck', [HomeController::class, 'pmCheck']);
Route::get('/Payment', [HomeController::class, 'payment']);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::view('/seller', 'layouts.seller');
Route::view('/master', 'layouts.master');
Route::view('/auth', 'layouts.auth');
Route::view('/admin', 'layouts.admin');
Route::view('/app', 'layouts.app');

Route::view('/header', 'partials.header');
Route::view('/footer', 'partials.footer');
Route::view('/admin/navbar', 'partials.admin.navbar-nav');
Route::view('/admin/sidebar', 'partials.admin.sidebar-nav');

Route::view('/login', 'auth.login');
Route::view('/register', 'auth.register');

Route::view('/buyer/index', 'buyer.index');
Route::view('/buyer/dashboard', 'buyer.dashboard');
Route::view('/buyer/orders', 'buyer.orders');
Route::view('/buyer/profile', 'buyer.profile');
Route::view('/buyer/tickets', 'buyer.tickets');

Route::view('/actions/addBalance', 'actions.addBalanceAction');
Route::view('/actions/payment', 'actions.paymentAction');
Route::view('/actions/addReply', 'actions.addReplyAction');
Route::view('/actions/withdrawalRequest', 'actions.WithdrawalRequestAction');



Route::view('/admin/dashboard', 'admin.dashboard');
Route::view('/admin/users', 'admin.users');


Route::view('/seller/dashboard', 'seller.dashboard');
Route::view('/seller/withdrawal-request', 'seller.withdrawal-request');
Route::view('/seller/withdrawal-request', 'seller.withdrawal-request');



Route::view('/404', 'errors.404');
Route::view('/500', 'errors.500');


Route::post('/tickets', [App\Http\Controllers\TicketController::class, 'store'])->name('tickets.store');
Route::get('/add-balance', [App\Http\Controllers\BalanceController::class, 'showForm'])->name('balance.form');
Route::post('/add-balance', [App\Http\Controllers\BalanceController::class, 'addBalance'])->name('balance.add');
Route::post('/buy-tool', [App\Http\Controllers\ToolPurchaseController::class, 'buyTool'])->name('tool.buy');
```




