
<x-app-layout>
    <head>
        @vite(['resources/css/payment-details.css'])  {{-- Assuming your CSS is in this file --}}
    </head>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Payment History Section --}}
                    <h2>Payment History</h2>

                    <div class="container"> 
                        <table>
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    {{-- End Payment History Section --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>