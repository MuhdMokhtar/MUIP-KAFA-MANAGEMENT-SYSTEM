<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="max-w-2xl mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Student Financial Details</h2>

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

                        @if($students->isNotEmpty()) 
                        {{-- Dropdown to select a student --}}
                        <form id="studentForm" method="GET" action="{{ route('payment-details') }}">
                            <div class="mb-3">
                                <label for="student" class="form-label">Select Student:</label>
                                <select id="student" name="student_id" class="form-select" onchange="document.getElementById('studentForm').submit();">
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>

                        {{-- Display selected student's details and payment button --}}
                        @if(request()->has('student_id'))
                        @php
                            $selectedStudent = $students->firstWhere('id', request('student_id'));
                            $fee = $selectedStudent->fees->sortByDesc('created_at')->first();
                        @endphp

                        @if ($fee && $fee->status === 'pending')
                        <div class="mt-4">
                            <div class="mb-3">
                                <label for="studentName" class="form-label">Student Name:</label>
                                <input type="text" id="studentName" class="form-control" value="{{ $selectedStudent->name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="tuitionFee" class="form-label">Tuition Fee:</label>
                                <input type="text" id="tuitionFee" class="form-control" value="{{ $fee ? $fee->tuition_fee : 'No payment found' }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="activityFee" class="form-label">Activity Fee:</label>
                                <input type="text" id="activityFee" class="form-control" value="{{ $fee ? $fee->activity_fee : 'No payment found' }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="totalFee" class="form-label">Total Fee:</label>
                                <input type="text" id="totalFee" class="form-control" value="{{ $fee ? ($fee->tuition_fee + $fee->activity_fee) : 'No payment found' }}" readonly>
                            </div>
                        </div>

                        <form action="{{ route('session', ['fee' => $fee->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary mt-4" type="submit">Pay Tuition Fee</button>
                        </form>
                        <script src="https://js.stripe.com/v3/"></script>
                        @else
                        <div class="alert alert-success mt-4">
                            The tuition fee has already been paid.
                        </div>
                        @endif
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
