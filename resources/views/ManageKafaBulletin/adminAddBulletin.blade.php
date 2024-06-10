<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3>Student Activities</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="text-start mb-0">Student Activities > Add Activities</h3>
                    </div>
                    <div class="mt-4">
                        <form method="POST" action="{{ route('store-activity') }}">
                        @csrf
                            <div class="mt-3">
                                <label for="activity_type" class="form-label text-start w-100">Activity Type</label>
                                <select class="form-select" id="activity_type" name="activity_type">
                                    <option selected>Choose...</option>
                                    <option value="Tuition">Tuition</option>
                                    <option value="Camps">Camps</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="activity_name" class="form-label text-start w-100">Activity Name</label>
                                <input type="text" class="form-control" id="activity_name" name="activity_name">
                            </div>
                            <div class="mt-3">
                                <label for="start_date" class="form-label text-start w-100">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="mt-3">
                                <label for="start_time" class="form-label text-start w-100">Start Time</label>
                                <input type="time" class="form-control" id="start_time" name="start_time">
                            </div>
                            <div class="mt-3">
                                <label for="end_date" class="form-label text-start w-100">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                            <div class="mt-3">
                                <label for="end_time" class="form-label text-start w-100">End Time</label>
                                <input type="time" class="form-control" id="end_time" name="end_time">
                            </div>
                            <div class="mt-3">
                                <label for="location" class="form-label text-start w-100">Location</label>
                                <input type="text" class="form-control" id="location" name="location">
                            </div>
                            <div class="mt-3">
                                <label for="description" class="form-label text-start w-100">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mt-3">
                                <label for="status" class="form-label text-start w-100">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option selected>Choose...</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Incompleted">Incompleted</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
