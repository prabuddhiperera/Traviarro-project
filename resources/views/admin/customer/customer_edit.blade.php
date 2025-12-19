<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

@include('admin.layouts.navbar')

<div class="p-6 max-w-xl mx-auto">

    <h1 class="text-3xl font-bold mb-6 text-gray-700">Edit Customer</h1>

    <form method="POST" action="{{ route('customers.update', $customer->id) }}"
          class="bg-white shadow p-6 rounded-lg">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="font-medium">Full Name</label>
            <input name="full_name" class="w-full border rounded p-2"
                   value="{{ $customer->full_name }}" required>
        </div>

        <div class="mb-3">
            <label class="font-medium">Email</label>
            <input name="email" type="email" class="w-full border rounded p-2"
                   value="{{ $customer->email }}">
        </div>

        <div class="mb-3">
            <label class="font-medium">Phone</label>
            <input name="phone" class="w-full border rounded p-2"
                   value="{{ $customer->phone }}">
        </div>

        <div class="mb-3">
            <label class="font-medium">Country</label>
            <input name="country" class="w-full border rounded p-2"
                   value="{{ $customer->country }}">
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="font-medium">Adults</label>
                <input name="number_of_adults" type="number"
                       class="w-full border rounded p-2"
                       value="{{ $customer->number_of_adults }}">
            </div>

            <div>
                <label class="font-medium">Children</label>
                <input name="number_of_children" type="number"
                       class="w-full border rounded p-2"
                       value="{{ $customer->number_of_children }}">
            </div>
        </div>

        <div class="mt-3">
            <label class="font-medium">Type</label>
            <input name="type" class="w-full border rounded p-2"
                   value="{{ $customer->type }}">
        </div>

        <div class="mt-3">
            <label class="font-medium">Notes</label>
            <textarea name="notes" class="w-full border rounded p-2">{{ $customer->notes }}</textarea>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('customers.index') }}"
               class="px-4 py-2 bg-gray-400 text-white rounded">
               Back
            </a>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Update
            </button>
        </div>

    </form>
</div>

</body>
</html>
