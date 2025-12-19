<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin | Manage Services</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100 flex">

@include('admin.layouts.navbar')

<div class="flex-1 ml-64">

  {{-- HEADER --}}
  <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center fixed top-0 left-64 right-0 z-50">
    <h1 class="text-2xl font-semibold tracking-wide">Services Dashboard</h1>
  </header>

  <main class="p-6 mt-[88px]">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-800 p-3 rounded mb-4 shadow">
        {{ session('success') }}
      </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-800 p-3 rounded mb-4 shadow">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- CREATE NEW SERVICE FORM --}}
    <form method="POST" action="{{ route('admin.services.store') }}" class="bg-white p-6 rounded-xl shadow mb-8" enctype="multipart/form-data">
      @csrf
      <h2 class="text-xl font-semibold mb-4">Create New Service</h2>

      <div class="grid grid-cols-2 gap-4">

        {{-- TITLE --}}
        <div class="col-span-2">
          <label class="block mb-1 font-medium">Service Title <span class="text-red-600">*</span></label>
          <input type="text" name="title" value="{{ old('title') }}" class="w-full border px-3 py-2 rounded-lg" required>
        </div>

        {{-- SLUG --}}
        <div class="col-span-2">
          <label class="block mb-1 font-medium">Slug</label>
          <input type="text" name="slug" value="{{ old('slug') }}" class="w-full border px-3 py-2 rounded-lg" readonly>
        </div>

        {{-- SHORT DESCRIPTION --}}
        <div class="col-span-2">
          <label class="block mb-1 font-medium">Short Description</label>
          <textarea name="short_description" class="w-full border px-3 py-2 rounded-lg">{{ old('short_description') }}</textarea>
        </div>

        {{-- DESCRIPTION --}}
        <div class="col-span-2">
          <label class="block mb-1 font-medium">Description</label>
          <textarea name="description" rows="4" class="w-full border px-3 py-2 rounded-lg">{{ old('description') }}</textarea>
        </div>

        {{-- CATEGORY --}}
        <div class="col-span-2 md:col-span-1">
          <label class="block mb-1 font-medium">Category</label>
          <select name="category" class="w-full md:w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
              <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                {{ $category }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- STATUS --}}
        <div class="col-span-2 md:col-span-1">
          <label class="block mb-1 font-medium">Status</label>
          <select name="status" class="w-full border px-3 py-2 rounded-lg">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>

        {{-- IMAGE --}}
        <div class="col-span-2">
          <label class="block mb-1 font-medium">Image</label>
          <input type="file" name="image" class="w-full border px-3 py-2 rounded-lg">
        </div>

      </div>

      <button type="submit" class="mt-4 bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
        Create Service
      </button>
    </form>

    {{-- SERVICES TABLE --}}
    <div class="bg-white shadow rounded-xl p-4 overflow-x-auto">
      <h2 class="text-xl font-semibold mb-4">Existing Services</h2>

      <table class="min-w-full bg-white border">
        <thead>
          <tr class="bg-gray-100">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Actions</th>
          </tr>
        </thead>

        <tbody>
          @foreach($services->sortBy('id') as $service)
          <tr class="border-b hover:bg-gray-50">
            <td class="border px-4 py-2">{{ $service->id }}</td>
            <td class="border px-4 py-2">{{ $service->title }}</td>
            <td class="border px-4 py-2">{{ $service->category ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $service->status }}</td>
            <td class="border px-4 py-2">
              @if($service->image)
                <img src="{{ asset($service->image) }}" class="h-12 w-24 rounded object-cover" />
              @else
                -
              @endif
            </td>
            <td class="border px-4 py-2 flex gap-2">
              <a href="{{ route('admin.services.edit', $service->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</a>

              <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </main>
</div>

<script>
  // Auto-generate slug
  $(document).on('input', 'input[name="title"]', function () {
    let slug = $(this).val().toLowerCase().replace(/ /g, '-').replace(/[^a-z0-9-]/g, '');
    $('input[name="slug"]').val(slug);
  });
</script>

</body>
</html>
