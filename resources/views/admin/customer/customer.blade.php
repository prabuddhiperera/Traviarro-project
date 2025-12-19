<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

@include('admin.layouts.navbar')

<div class="p-6 ml-64">

    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Manage Customers</h1>
        <button onclick="document.getElementById('addModal').showModal()"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
            + Add Customer
        </button>
    </div>

    <!-- Customer Table -->
    <div class="bg-white rounded-lg shadow p-4 overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-3 text-left">Full Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Phone</th>
                    <th class="px-4 py-3 text-left">Country</th>
                    <th class="px-4 py-3 text-left">Adults</th>
                    <th class="px-4 py-3 text-left">Children</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Notes</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($customers as $customer)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $customer->full_name }}</td>
                    <td class="px-4 py-3">{{ $customer->email }}</td>
                    <td class="px-4 py-3">{{ $customer->phone }}</td>
                    <td class="px-4 py-3">{{ $customer->country }}</td>
                    <td class="px-4 py-3">{{ $customer->number_of_adults }}</td>
                    <td class="px-4 py-3">{{ $customer->number_of_children }}</td>
                    <td class="px-4 py-3">{{ $customer->type }}</td>
                    <td class="px-4 py-3">{{ $customer->notes }}</td>

                    <td class="px-4 py-3 text-center flex gap-2 justify-center">

                        <a href="{{ route('customers.edit', $customer->id) }}"
                           class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                           Edit
                        </a>

                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this customer?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>


<!-- Add Modal -->
<dialog id="addModal" class="rounded-lg p-0">
    <form method="POST" action="{{ route('customers.store') }}" class="p-6 w-[400px]">
        @csrf

        <h2 class="text-xl font-semibold mb-4">Add Customer</h2>

        <div class="mb-3">
            <label class="font-medium">Full Name</label>
            <input name="full_name" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="font-medium">Email</label>
            <input name="email" type="email" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="font-medium">Phone</label>
            <input name="phone" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="font-medium">Country</label>
            <input name="country" class="w-full border rounded p-2">
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="font-medium">Adults</label>
                <input name="number_of_adults" type="number" class="w-full border rounded p-2" value="1">
            </div>

            <div>
                <label class="font-medium">Children</label>
                <input name="number_of_children" type="number" class="w-full border rounded p-2" value="0">
            </div>
        </div>

        <div class="mt-3">
            <label class="font-medium">Type</label>
            <input name="type" class="w-full border rounded p-2">
        </div>

        <div class="mt-3">
            <label class="font-medium">Notes</label>
            <textarea name="notes" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button type="button"
                    onclick="document.getElementById('addModal').close()"
                    class="px-4 py-2 bg-gray-300 rounded">
                Cancel
            </button>
            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Save
            </button>
        </div>

    </form>
</dialog>

</body>
</html>
