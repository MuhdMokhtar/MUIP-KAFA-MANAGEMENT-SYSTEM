<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3>Student Results</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="text-start mb-0">Student Results</h3>
                        <form method="POST" action="{{ route('store-student-result') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add Result</button>
                        </form>
                    </div>
                    <div class="mt-4">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $result->student_name }}</td>
                                        <td>{{ $result->subject }}</td>
                                        <td>{{ $result->grade }}</td>
                                        <td>{{ $result->status }}</td>
                                        <td>
                                            <!-- Add any action buttons or links here -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($results->isEmpty())
                            <p class="text-center">No results found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>