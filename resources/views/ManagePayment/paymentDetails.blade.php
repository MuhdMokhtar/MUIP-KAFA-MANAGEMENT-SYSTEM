<x-app-layout>

    <head>
        @vite(['resources/css/payment-details.css'])  {{-- CSS path --}}
    </head>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2>Student Financial Detail</h2>
    
                        <div class="container"> 
                            <label for="studentName">Student Name</label>
                            @if(isset($student))
                                <input type="text" id="studentName" name="studentName" value="{{ $student->name }}" readonly> 
                            @else
                                <input type="text" id="studentName" name="studentName" value="No student found" readonly>
                            @endif

                            <label for ="tuitonFee">Tuition Fee</label>
                            @if(isset($fee))
                                <input type="text" id="tuitonFee" name="tuitonFee" value="{{$fee->tuition_fee}}" readonly>
                            @else
                                <input type="text" id="tuitonFee" name="tuitonFee" value="No payment found" readonly>
                            @endif

                            <label for="activityFee">Activity Fee</label>
                            @if(isset($fee))
                                <input type="text" id="activityFee" name="activityFee" value="{{ $fee->activity_fee }}" readonly>
                            @else
                                <input type="text" id="activityFee" name="activityFee" value="No payment found" readonly>
                            @endif

                            <label for ="totalFee">Total Fee</label>
                            @if(isset($fee))
                                <input type="text" id="totalFee" name="totalFee" value="{{ $fee->total_fee }}" readonly>
                            @else
                                <input type="text" id="totalFee" name="totalFee" value="No payment found" readonly>
                            @endif

                            </div> 
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>


