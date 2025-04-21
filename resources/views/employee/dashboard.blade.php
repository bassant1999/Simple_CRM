<x-app-layout>
    <x-slot name="header">
        <div class="text-end">  
            <!-- Add Customer -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCustomer">
                <i class="bi bi-plus"></i> Customer
            </button> 
        </div> 
        <div class="modal fade" id="addCustomer" tabindex="-1" aria-labelledby="addCustomerModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerModal">Add Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('customers.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label>Name</label>
                                <input type="text" name="name" class="border rounded w-full" required>
                            </div>

                            <div class="mb-4">
                                <label>Email</label>
                                <input type="email" name="email" class="border rounded w-full" required>
                            </div>

                            <div class="mb-4">
                                <label>Password</label>
                                <input type="password" name="password" class="border rounded w-full" required>
                            </div>

                            <div class="mb-4">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="border rounded w-full" required>
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded"> Add </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="mb-3 mt-3"> Customers </h1>
        @if ($customers->isEmpty())
            <p>No customers available.</p>
        @else
            <ul class="list-group">
                @foreach ($customers as $customer)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $customer->name }}
                        <button class="btn btn-link p-0 m-0 align-baseline text-success text-decoration-none" data-bs-toggle="modal" data-bs-target="#addActionModal-{{ $customer->id }}">
                            <i class="bi bi-plus"></i> Action
                        </button>
                        <div class="modal fade" id="addActionModal-{{ $customer->id }}" tabindex="-1" aria-labelledby="addActionModalLabel-{{ $customer->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('customers.addAction') }}">
                                    @csrf
                                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addActionModalLabel-{{ $customer->id }}">Add Action for {{ $customer->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Type</label>
                                                <select name="type" class="form-select" required>
                                                    <option value="">Select type</option>
                                                    <option value="call">Call</option>
                                                    <option value="visit">Visit</option>
                                                    <option value="follow_up">Follow Up</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label>Result</label>
                                                <textarea name="result" class="form-control" required></textarea>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</x-app-layout>
