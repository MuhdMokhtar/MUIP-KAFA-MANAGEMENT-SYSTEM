<x-app-layout>
    <head>
        @vite(['resources/css/payment-details.css'])
    </head>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-3 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Student Financial Details</h2>

                    

                    @if($students->isNotEmpty()) 
                        {{-- Dropdown to select a student --}}
                        <form method="GET" action="{{ route('payment-details') }}">
                            <label for="student">Select Student:</label>
                            <select id="student" name="student_id">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit">View Details</button>
                        </form>

                        {{-- Display selected student's details and payment button --}}
                        @if(request()->has('student_id'))
                            @php
                                $selectedStudent = $students->firstWhere('id', request('student_id'));
                                $fee = $selectedStudent->fees->sortByDesc('created_at')->first();
                            @endphp

                            <div class="container mt-4">
                                <label for="studentName">Student Name:</label>
                                <input type="text" id="studentName" value="{{ $selectedStudent->name }}" readonly>

                                <label for="tuitionFee">Tuition Fee:</label>
                                <input type="text" id="tuitionFee" value="{{ $fee ? $fee->tuition_fee : 'No payment found' }}" readonly>

                                <label for="activityFee">Activity Fee:</label>
                                <input type="text" id="activityFee" value="{{ $fee ? $fee->activity_fee : 'No payment found' }}" readonly>
                                
                                <label for="totalFee">Total Fee:</label>
                                <input type="text" id="totalFee" value="{{ $fee ? ($fee->tuition_fee + $fee->activity_fee) : 'No payment found' }}" readonly>
                            </div>

                            @if ($fee && $fee->status === 'pending')
                            <form action="{{ route('session', ['fee' => $fee->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary mt-4" type="submit">Pay Tuition Fee</button>
                                </form>
                                <script src="https://js.stripe.com/v3/"></script>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>