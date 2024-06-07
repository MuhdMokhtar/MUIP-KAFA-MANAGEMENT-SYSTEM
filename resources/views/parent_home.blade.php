<x-app-layout>
    <div class="py-12">
      <div class="max-w-2xl mx-auto sm:px-3 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("MUIP KAFA") }}

                    @if (auth()->user()->hasRole('parent'))  {{-- Show form only for parents --}}

                    <div class="container mt-4">
                      <form method="POST" action="{{ route('students.store') }}">
                          @csrf
                  
                          <div class="mb-3">
                              <label for="name" class="form-label">Student Name:</label>
                              <input type="text" name="name" id="name" class="form-control" required>
                          </div>
                  
                          <div class="mb-3">
                              <label for="date_of_birth" class="form-label">Date of Birth:</label>
                              <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                          </div>
                  
                          <div class="mb-3">
                              <label for="grade" class="form-label">Darjah:</label>
                              <input type="text" name="grade" id="grade" class="form-control">
                          </div>
                  
                          <button type="submit" class="btn btn-primary">Add Student</button>
                      </form>
                  </div>
                    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="successModalLabel">Success</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Student added successfully!
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      {{-- Include Bootstrap JS and Your Custom JS --}}
                      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                      <script>
                        // Check for the success message in the session
                        @if(Session::has('success'))
                          const myModal = new bootstrap.Modal('#successModal');
                          myModal.show();
                        @endif
                      </script>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>