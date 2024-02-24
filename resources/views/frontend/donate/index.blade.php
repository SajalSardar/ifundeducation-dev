@extends('layouts.clientapp')
@section('title', 'Donation List')

@section('content')
    <div class="mb-5">
        <div class="account_content_area">
            <h3>Total Donations</h3>
            <div class="account_content_area_form table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fundraiser Title</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Donor</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($all_donars as  $donar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $donar->title }}</td>
                                <td>${{ number_format($donar->amount, 2) }}</td>
                                <td>{{ $donar->created_at->format('M d, Y') }}</td>
                                <td>{{ $donar->display_publicly === 'yes' ? $donar->donar_name : 'Guest' }}
                                </td>
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
