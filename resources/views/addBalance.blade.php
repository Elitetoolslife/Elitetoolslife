


@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Balance</h3>
    <form id="formAddBalance" method="POST" action="{{ route('balance.add') }}">
        @csrf
        <div class="form-group">
            <label for="method">Method</label>
            <select name="methodpay" class="form-control">
                <option value="BitcoinPayment">Bitcoin</option>
                <option value="PerfectMoneyPayment">Perfect Money</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Balance</button>
    </form>
</div>
@endsection