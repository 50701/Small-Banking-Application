@extends('layouts/layout1')


@section('content')

<form class="card">
    <div class="card-header">
        <h3 class="card-title">Statement of account</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if($statements->isEmpty())
                <p>No statements available.</p>
            @else
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DATETIME</th>
                            <th>AMOUNT</th>
                            <th>TYPE</th>
                            <th>DETAILS</th>
                            <th>BALANCE</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($statements as $index => $statement)
                        <tr>
                            <td class="text-secondary">{{ $statements->firstItem() + $index }}</td>
                            <td class="text-secondary">{{ $statement->created_at->format('d-m-Y h:i A') }}</td>
                            <td class="text-secondary">{{ $statement->amount }}</td>
                            <td class="text-secondary">{{ ucfirst($statement->type) }}</td>
                            <td class="text-secondary">
                            @if($statement->type == 'credit')
                                {{ $statement->details }}
                            @else
                                {{ $statement->details }}
                            @endif
                            </td>
                            <td class="text-secondary">{{ $statement->balance }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <!-- Display pagination links -->
                <!-- 
                <div class="pagination">
                    {{ $statements->links() }}
                </div> 
                -->

                <!-- Display pagination links using custom view -->
                {{ $statements->links('custom-pagination') }}
            @endif
        </div>
    </div>
</form>

@endsection