<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3>Student Activities</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="text-start mb-0">Student Activities</h3>
                        <a href="{{ route('add-activity') }}" class="btn btn-warning" style="height: auto; font-size: 1.5rem; font-weight: bold;">Add Activity</a>
                    </div>
                    <div class="mt-4">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Activity Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $activity->activity_name }}</td>
                                        <td>{{ $activity->start_date }}</td>
                                        <td>{{ $activity->end_date }}</td>
                                        <td>{{ $activity->status }}</td>
                                        <td>
                                            <a href="{{ route('view-activity', $activity->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('edit-activity', $activity->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('delete-activity', $activity->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($activities->isEmpty())
                            <p class="text-center">No activities found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
