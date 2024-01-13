@extends('layouts.clientapp')
@section('title', 'Donation List')

@section('content')
    <div class="mb-5">
        <div class="account_content_area">
            <h3>Donation List</h3>
            <div class="account_content_area_form table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($all_donars as $key => $donar)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $donar->display_publicly === 'yes' ? $donar->donar_name : 'Guest' }}
                                </td>
                                <td>${{ number_format($donar->amount, 2) }}</td>
                                <td>{{ $donar->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Donation Not Found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $all_donars->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
