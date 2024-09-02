@extends('layouts/layout1')


@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Welcome {{ $currentUser->name }}</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <tr>
                <td class="text-secondary w_150">YOUR ID</td>
                <td>{{ $currentUser->email }}</td>
            </tr>
            <tr>
                <td class="text-secondary w_150">YOUR Balance</td>
                <td>{{ $currentUser->balance }} INR</td>
            </tr>
        </table>
    </div>
</div>

@endsection