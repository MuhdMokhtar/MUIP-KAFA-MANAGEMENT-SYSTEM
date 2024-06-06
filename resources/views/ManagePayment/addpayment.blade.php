<form method="POST" action="{{ route('ManagePayment.addpayment', $student) }}">
    @csrf

    <label for="student_id">Student ID:</label>
    <input type="text" name="student_id" id="student_id" value="{{ $student->student_id }}" readonly>
    

    <label for="tuition_fee">Tuition Fee:</label>
    <input type="number" name="tuition_fee" id="tuition_fee" required>

    <label for="activity_fee">Activity Fee:</label>
    <input type="number" name="activity_fee" id="activity_fee" required>



    <button type="submit">Add Fee</button>
</form>