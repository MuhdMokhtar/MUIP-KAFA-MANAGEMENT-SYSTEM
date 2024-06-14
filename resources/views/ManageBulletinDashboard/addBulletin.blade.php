<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Section Title -->    
        <h3>Bulletin Dashboard</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Subsection Title -->
                        <h3 class="text-start mb-0">Bulletin Dashboard > Add Bulletin</h3>
                    </div>
                    <div class="mt-4">
                        <!-- Form for adding a new bulletin -->
                        <form method="POST" action="{{ route('store-bulletin') }}">
                        @csrf
                            <div class="mt-3">
                                <!-- Bulletin Title Input -->
                                <label for="bulletin_title" class="form-label text-start w-100">Bulletin Title</label>
                                <input type="text" class="form-control" id="bulletin_title" name="bulletin_title">
                            </div>
                            <div class="mt-3">
                                <!-- Description Textarea -->
                                <label for="description" class="form-label text-start w-100">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mt-4">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
