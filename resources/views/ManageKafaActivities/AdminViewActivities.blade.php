<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-center mb-4">Student Activities</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form>
                        <div class="mt-3">
                            <label for="activity_type" class="form-label text-start w-100">Activity Type</label>
                            <input type="text" id="activity_type" class="form-control" value="{{ $activity->activity_type }}" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="activity_name" class="form-label text-start w-100">Activity Name</label>
                            <input type="text" id="activity_name" class="form-control" value="{{ $activity->activity_name }}" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="start_date" class="form-label text-start w-100">Start Date</label>
                            <input type="date" id="start_date" class="form-control" value="{{ $activity->start_date }}" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="start_time" class="form-label text-start w-100">Start Time</label>
                            <input type="time" id="start_time" class="form-control" value="{{ $activity->start_time }}" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="end_date" class="form-label text-start w-100">End Date</label>
                            <input type="date" id="end_date" class="form-control" value="{{ $activity->end_date }}" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="end_time" class="form-label text-start w-100">End Time</label>
                            <input type="time" id="end_time" class="form-control" value="{{ $activity->end_time }}" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="location" class="form-label text-start w-100">Location</label>
                            <input type="text" id="location" class="form-control" value="{{ $activity->location }}" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="description" class="form-label text-start w-100">Description</label>
                            <textarea id="description" class="form-control" rows="3" readonly>{{ $activity->description }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label text-start w-100">Status</label>
                            <input type="text" id="status" class="form-control" value="{{ $activity->status }}" readonly>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('manage-activity') }}" class="btn btn-primary">Back to Activities</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
