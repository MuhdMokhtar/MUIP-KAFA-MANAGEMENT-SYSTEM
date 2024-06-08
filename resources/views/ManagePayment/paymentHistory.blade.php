<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Payment History</h2>

                    
                        <table class="table table-striped table-hover"> 
                            <thead>
                                <tr>
                                    <th>Fee ID</th>
                                    <th>Student Name</th> 
                                    <th>Date</th>
                                    <th>Tuition Fee</th> 
                                    <th>Activity Fee</th>
                                    <th>Total Amount</th> {{-- Add Total Amount Column --}}
                                    <th>Status</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fees as $fee) 
                                    <tr>
                                        <td>{{ $fee->id }}</td>
                                        <td>{{ $fee->student->name }}</td> 
                                        <td>{{ $fee->created_at->format('Y-m-d') }}</td> 
                                        <td>{{ number_format($fee->tuition_fee, 2) }}</td>
                                        <td>{{ number_format($fee->activity_fee, 2) }}</td>
                                        <td>{{ number_format($fee->tuition_fee + $fee->activity_fee, 2) }}</td> {{-- Calculate Total Amount --}}
                                        <td>{{ $fee->status }}</td>
                                        <td>
                                            <a href="{{ route('fees.info', ['fee' => $fee->id]) }}" class="btn btn-sm btn-info">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                       </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>