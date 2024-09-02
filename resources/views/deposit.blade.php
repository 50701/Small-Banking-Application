@extends('layouts/layout1')


@section('content')

<form class="card" action="{{ route('deposit') }}" method="post">
    @csrf
    <div class="card-header">
        <h3 class="card-title">Deposit Money</h3>
    </div>
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        @if ($errors->any())
            <div class="alert alert-warning" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v4"></path><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path><path d="M12 16h.01"></path></svg>
                    </div>
                    <div>
                        Uh oh, something went wrong 
                    </div>
                </div>
                <div class="errors_heilight">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label amount required">Amount</label>
            <div>
                <input type="number" class="form-control" placeholder="Enter amount to deposit" id="amount" name="amount" min="1" value="{{ old('amount') }}" required>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Deposit</button>
        </div>
    </div>
</form>

@endsection