<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function ajaxinfo() {
        return view('ajaxinfo');
    }

    public function mailer() {
        return view('mailer');
    }

    public function shell() {
        return view('shell');
    }

    public function leads() {
        return view('leads');
    }

    public function premium() {
        return view('premium');
    }

    public function addBalance() {
        return view('addBalance');
    }

    public function divPage($page) {
        return view('divPage' . $page);
    }

    public function settingEdit() {
        return view('settingEdit');
    }

    public function createTicket() {
        return view('tticket');
    }

    public function createReport() {
        return view('treport');
    }

    public function funds() {
        return view('funds');
    }

    public function addBalanceAction() {
        return view('addBalanceAction');
    }

    public function rdp() {
        return view('rdp');
    }

    public function tutorial() {
        return view('tutorial');
    }

    public function makePayment() {
        return view('pay');
    }

    public function bitcoinPayment() {
        return view('btc3');
    }

    public function banks() {
        return view('banks');
    }

    public function perfectMoneyPayment() {
        return view('pm3');
    }

    public function tickets() {
        return view('tickets');
    }

    public function seller() {
        return view('becomeseller');
    }

    public function scampage() {
        return view('scampage');
    }

    public function logout() {
        return view('logout');
    }

    public function active() {
        return view('active');
    }

    public function orders() {
        return view('orders');
    }

    public function setting() {
        return view('setting');
    }

    public function staticPage() {
        return view('static');
    }

    public function smtp() {
        return view('smtp');
    }

    public function addSingleTool() {
        return view('addt');
    }

    public function cPanel() {
        return view('cPanel');
    }

    public function checkEmailChange() {
        return view('checkEmailChange');
    }

    public function reports() {
        return view('reports');
    }

    public function rules() {
        return view('shoprules');
    }

    public function account() {
        return view('profile');
    }

    public function addCards() {
        return view('addc');
    }

    public function vt($id) {
        return view('vt')->with('id', $id);
    }

    public function vr($id) {
        return view('vr')->with('id', $id);
    }

    public function divPageTicket($id) {
        return view('divPageticket')->with('id', $id);
    }

    public function divPageReport($id) {
        return view('divPagereport')->with('id', $id);
    }

    public function showTicket($id) {
        return view('showTicket')->with('id', $id);
    }

    public function checkShell($id) {
        return view('check2shell')->with('id', $id);
    }

    public function checkSMTP($id) {
        return view('check2smtp')->with('id', $id);
    }

    public function checkCpanel($id) {
        return view('check2cp')->with('id', $id);
    }

    public function checkMailer($id) {
        return view('check2mailer')->with('id', $id);
    }

    public function showOrder($id) {
        return view('openorder')->with('id', $id);
    }

    public function addReply($id) {
        return view('addReply')->with('id', $id);
    }

    public function addReportReply($id) {
        return view('addReportReply')->with('id', $id);
    }

    public function divPagePayment($p_data) {
        return view('divPagepayment')->with('p_data', $p_data);
    }

    public function check() {
        return view('check');
    }

    public function pmCheck() {
        return view('PMcheck');
    }

    public function payment() {
        return view('payment');
    }
}