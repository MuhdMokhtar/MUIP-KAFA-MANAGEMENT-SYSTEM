<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3>KAFA Bulletin Dashboard</h3>
            <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="text-start mb-0">DASHBOARD</h3>
                        <a href="{{ route('create-post') }}" class="btn btn-warning" style="height: auto; font-size: 1.5rem; font-weight: bold;">Create post</a>
                    </div>
                    <div class="mt-4">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bulletin Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bulletins as $bulletin)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><strong>{{ $bulletin->bulletin_title }}</strong></td>
                                        <td>
                                            <button data-id="{{ $bulletin->id }}" class="btn btn-info btn-sm view-details">View</button>
                                            <a href="{{ route('edit-bulletin', $bulletin->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('delete-bulletin', $bulletin->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($bulletins->isEmpty())
                            <p class="text-center">No bulletin found.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div id="viewDetails" class="popup" style="display: none;">
                <div class="popup-content">
                    <span class="close">&times;</span>
                    <div id="detailsContent"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            width: 90%;
            position: relative;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
        .table td {
            font-weight: bold;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewButtons = document.querySelectorAll('.view-details');
            const viewDetailsDiv = document.getElementById('viewDetails');
            const detailsContentDiv = document.getElementById('detailsContent');
            const closePopup = document.querySelector('.close');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const bulletinId = this.getAttribute('data-id');
                    fetchBulletinDetails(bulletinId);
                });
            });

            closePopup.addEventListener('click', function() {
                viewDetailsDiv.style.display = 'none';
            });

            window.onclick = function(event) {
                if (event.target == viewDetailsDiv) {
                    viewDetailsDiv.style.display = 'none';
                }
            };

            function fetchBulletinDetails(id) {
                fetch(`/bulletins/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        detailsContentDiv.innerHTML = `
                            <h3>${data.bulletin_title}</h3>
                            <p>${data.description}</p>
                        `;
                        viewDetailsDiv.style.display = 'flex';
                    })
                    .catch(error => console.error('Error fetching bulletin details:', error));
            }
        });
    </script>
</x-admin-layout>
