<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Service | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100 flex">

@include('admin.layouts.navbar')

<div class="flex-1 ml-64">

    {{-- HEADER --}}
    <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center fixed top-0 left-64 right-0 z-50">
      <h1 class="text-2xl font-semibold tracking-wide">Edit Service</h1>
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

      {{-- EDIT FORM --}}
      <form method="POST" action="{{ route('admin.services.update', $service->id) }}" 
            class="bg-white p-6 rounded-xl shadow mb-8" 
            enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold mb-4">Update Service</h2>

        <div class="grid grid-cols-2 gap-4">

          {{-- TITLE --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Service Title <span class="text-red-600">*</span></label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" 
                   class="w-full border px-3 py-2 rounded-lg" required>
          </div>

          {{-- SLUG --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $service->slug) }}" 
                   class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          {{-- SHORT DESCRIPTION --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Short Description</label>
            <textarea name="short_description" class="w-full border px-3 py-2 rounded-lg">{{ old('short_description', $service->short_description) }}</textarea>
          </div>

          {{-- DESCRIPTION --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" rows="4" class="w-full border px-3 py-2 rounded-lg">{{ old('description', $service->description) }}</textarea>
          </div>

          {{-- CATEGORY --}}
          <div>
            <label class="block mb-1 font-medium">Category</label>
            <select name="category" 
              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>

              <option value="">Select Category</option>

              @foreach($categories as $category)
                <option value="{{ $category }}" 
                  {{ old('category', $service->category) == $category ? 'selected' : '' }}>
                  {{ $category }}
                </option>
              @endforeach

            </select>
          </div>

          {{-- STATUS --}}
          <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded-lg">
              <option value="Active" {{ $service->status == 'Active' ? 'selected' : '' }}>Active</option>
              <option value="Inactive" {{ $service->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>

          {{-- IMAGE --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Replace Image</label>
            <input type="file" name="image" class="w-full border px-3 py-2 rounded-lg">

            @if($service->image)
              <p class="mt-2 text-gray-600">Current Image:</p>
              <img src="{{ asset($service->image) }}" 
                   class="h-28 w-48 object-cover rounded mt-2 border" />
            @endif
          </div>

        </div>

        <button type="submit" class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
          Update Service
        </button>
      </form>

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
