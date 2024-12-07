@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Purchase Tool</h2>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{ route('tool.buy') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $tool->id }}">
        <button type="submit" class="btn btn-primary">Purchase Tool</button>
    </form>
</div>
@endsection