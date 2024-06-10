<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-center mb-4">Edit Activity</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('update-activity', $activity->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mt-3">
                            <label for="activity_type" class="form-label text-start w-100">Activity Type</label>
                            <select id="activity_type" name="activity_type" class="form-control">
                                <option value="Tuition" {{ $activity->activity_type == 'Tuition' ? 'selected' : '' }}>Tuition</option>
                                <option value="Camps" {{ $activity->activity_type == 'Camps' ? 'selected' : '' }}>Camps</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="activity_name" class="form-label text-start w-100">Activity Name</label>
                            <input type="text" id="activity_name" name="activity_name" class="form-control" value="{{ $activity->activity_name }}">
                        </div>
                        <div class="mt-3">
                            <label for="start_date" class="form-label text-start w-100">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $activity->start_date }}">
                        </div>
                        <div class="mt-3">
                            <label for="start_time" class="form-label text-start w-100">Start Time</label>
                            <input type="time" id="start_time" name="start_time" class="form-control" value="{{ $activity->start_time }}">
                        </div>
                        <div class="mt-3">
                            <label for="end_date" class="form-label text-start w-100">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $activity->end_date }}">
                        </div>
                        <div class="mt-3">
                            <label for="end_time" class="form-label text-start w-100">End Time</label>
                            <input type="time" id="end_time" name="end_time" class="form-control" value="{{ $activity->end_time }}">
                        </div>
                        <div class="mt-3">
                            <label for="location" class="form-label text-start w-100">Location</label>
                            <input type="text" id="location" name="location" class="form-control" value="{{ $activity->location }}">
                        </div>
                        <div class="mt-3">
                            <label for="description" class="form-label text-start w-100">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3">{{ $activity->description }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label text-start w-100">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="Inprogress" {{ $activity->status == 'Inprogress' ? 'selected' : '' }}>Inprogress</option>
                                <option value="Completed" {{ $activity->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Incompleted" {{ $activity->status == 'Incompleted' ? 'selected' : '' }}>Incompleted</option>
                                
                            </select>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Update Activity</button>
                            <a href="{{ route('manage-activity') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
