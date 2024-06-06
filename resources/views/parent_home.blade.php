<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("MUIP KAFA") }}

                    @if (auth()->user()->hasRole('parent'))  {{-- Show form only for parents --}}

                    <form method="POST" action="{{ route('students.store') }}"> 
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Student Name:</label>
                            <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mt-4">
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth:</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="darjah" class="block text-sm font-medium text-gray-700">Darjah:</label>
                            <input type="text" name="grade" id="grade" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Student</button>

                    </form>
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