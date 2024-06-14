<x-admin-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h3>Add Student Result</h3>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form method="POST" action="{{ route('store-student-result') }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="student_name" class="form-label text-start w-100">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" required>
          </div>
          <div class="mb-3">
            <label for="subject" class="form-label text-start w-100">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
          </div>
          <div class="mb-3">
            <label for="grade" class="form-label text-start w-100">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" required>
          </div>
          <div class="mb-3">
            <label for="score" class="form-label text-start w-100">Score (Optional)</label>
            <input type="number" class="form-control" id="score" name="score">
          </div>
          <div class="mb-3">
            <label for="status" class="form-label text-start w-100">Status</label>
            <select class="form-select" id="status" name="status" required>
              <option selected disabled>Choose...</option>
              <option value="passed">Passed</option>
              <option value="failed">Failed</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="comment" class="form-label text-start w-100">Comment/Feedback (Optional)</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-admin-layout>
