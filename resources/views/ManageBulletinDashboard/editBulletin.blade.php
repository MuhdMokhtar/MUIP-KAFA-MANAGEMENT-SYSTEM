<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-center mb-4">Edit Bulletin</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('update-bulletin', $bulletin->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mt-3">
                            <label for="bulletin_title" class="form-label text-start w-100">Bulletin Name</label>
                            <input type="text" id="bulletin_title" name="bulletin_title" class="form-control" value="{{ $bulletin->bulletin_title }}">
                        </div>
                        <div class="mt-3">
                            <label for="description" class="form-label text-start w-100">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3">{{ $bulletin->description }}</textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Update bulletin</button>
                            <a href="{{ route('manage-dashboard') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
