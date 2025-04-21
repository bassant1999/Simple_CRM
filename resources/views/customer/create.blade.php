<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Customer
        </h2>
    </x-slot>

    <div class="py-6 px-6">
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

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Customer</button>
        </form>
    </div>
</x-app-layout>
