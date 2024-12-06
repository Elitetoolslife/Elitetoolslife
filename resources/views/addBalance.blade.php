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

<script>
    document.getElementById('formAddBalance').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                alert('Balance added successfully');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
@endsection