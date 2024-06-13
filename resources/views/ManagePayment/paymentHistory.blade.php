<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">Payment History</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Fee ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Date and Time</th>
                                    <th scope="col">Tuition Fee</th>
                                    <th scope="col">Activity Fee</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fees as $fee)
                                    <tr>
                                        <td>{{ $fee->id }}</td>
                                        <td>{{ $fee->student->name }}</td>
                                        <td>{{ $fee->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ number_format($fee->tuition_fee, 2) }}</td>
                                        <td>{{ number_format($fee->activity_fee, 2) }}</td>
                                        <td>{{ number_format($fee->tuition_fee + $fee->activity_fee, 2) }}</td>
                                        <td>{{ ucfirst($fee->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
