<x-app-layout>
    <x-slot name="header">
        <div class="text-end">  
            <!-- Add Customer -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCustomer">
                <i class="bi bi-plus"></i> Customer
            </button> 
             <!-- Add Employee -->
             <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployee">
                <i class="bi bi-plus"></i> Employee
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

        <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployeeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEmployeeModal">Add Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('employee.store') }}">
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

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <ul class="nav nav-tabs" id="crmTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="customers-tab" data-bs-toggle="tab" data-bs-target="#customers" type="button" role="tab" aria-controls="customers" aria-selected="true">Customers</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="employees-tab" data-bs-toggle="tab" data-bs-target="#employees" type="button" role="tab" aria-controls="employees" aria-selected="false">Employees</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3 mb-3" id="crmTabsContent">
                        <!-- Customers Tab -->
                        <div class="tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="customers-tab">
                            @if ($customers->isEmpty())
                                <p>No customers available.</p>
                            @else
                                <ul class="list-group">
                                    @foreach ($customers as $customer)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $customer->name }}</span>
                                        <button class="btn btn-link p-0 m-0 align-baseline text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#assignModal-{{ $customer->id }}">
                                            Assign
                                        </button>
                                            <div class="modal fade" id="assignModal-{{ $customer->id }}" tabindex="-1" aria-labelledby="assignModalLabel-{{ $customer->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form method="POST" action="{{ route('customers.assign') }}">
                                                        @csrf
                                                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                                        
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="assignModalLabel-{{ $customer->id }}">Assign {{ $customer->name }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="employee_id_{{ $customer->id }}" class="form-label">Select Employee</label>
                                                                    <select class="form-select" name="employee_id" id="employee_id_{{ $customer->id }}" required>
                                                                        <option value="" selected disabled>Choose employee</option>
                                                                        @foreach ($employees as $employee)
                                                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Assign</button>
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

                        <!-- Employees Tab -->
                        <div class="tab-pane fade" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                            @if ($employees->isEmpty())
                                <p>No employees available.</p>
                            @else
                                <ul class="list-group">
                                    @foreach ($employees as $employee)
                                        <li class="list-group-item">{{ $employee->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
