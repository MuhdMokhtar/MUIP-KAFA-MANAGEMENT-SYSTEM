<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3>Student Results</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="text-start mb-0">Student Results</h3>
                    </div>
                    <div class="mt-4">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->subject }}</td>
                                        <td>{{ $result->grade }}</td>
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