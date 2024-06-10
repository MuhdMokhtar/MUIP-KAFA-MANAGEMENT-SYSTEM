<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="container">
            <div class="max-w-2xl mx-auto">
            <h3 class="text-center mb-4">KAFA Activities</h3>
                <div class="bg-white rounded-lg shadow-md">
                    <div class="mt-4">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Activity Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $activity->activity_name }}</td>
                                        <td>{{ $activity->start_date }}</td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm">Booking</a>
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
</x-app-layout>

