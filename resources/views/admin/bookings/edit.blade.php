<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Booking | Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

  {{-- Sidebar --}}
  @include('admin.layouts.navbar')

  <div class="flex-1 ml-64">

    <!-- Header -->
    <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center sticky top-0 z-40">
        <h1 class="text-2xl font-semibold tracking-wide">Edit Booking</h1>
        <div class="flex items-center space-x-3">
            <span class="font-medium">{{ $admin->name ?? 'Admin' }}</span>
            <img src="{{ asset('img/admin-avatar.png') }}" class="w-10 h-10 rounded-full border-2 border-white">
        </div>
    </header>

    <main class="p-6">

      {{-- Success --}}
      @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 shadow">
          {{ session('success') }}
        </div>
      @endif

      @if ($errors->any())
          <div class="bg-red-100 text-red-800 p-3 rounded mb-4 shadow">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}" class="bg-white p-6 rounded-xl shadow" >
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold mb-6">Edit Booking #{{ $booking->reservation_id ?? $booking->id }}</h2>

        <div class="grid grid-cols-2 gap-4">

          {{-- Customer Name --}}
          <div>
            <label class="block mb-1 font-medium">Customer Name</label>
            <input type="text" name="customer_name" value="{{ $booking->customer_name }}" readonly class="w-full border px-3 py-2 rounded-lg bg-gray-100">
          </div>

          {{-- Phone --}}
          <div>
            <label class="block mb-1 font-medium">Phone</label>
            <input type="text" name="phone" value="{{ $booking->phone }}" readonly class="w-full border px-3 py-2 rounded-lg bg-gray-100">
          </div>

          {{-- From Location --}}
          <div>
            <label class="block mb-1 font-medium">From</label>
            <select name="from_location" class="w-full border px-3 py-2 rounded-lg" required>
              @foreach($locations as $loc)
                <option value="{{ $loc }}" {{ $booking->from_location == $loc ? 'selected' : '' }}>{{ $loc }}</option>
              @endforeach
            </select>
          </div>

          {{-- To Location --}}
          <div>
            <label class="block mb-1 font-medium">To</label>
            <select name="to_location" class="w-full border px-3 py-2 rounded-lg" required>
              @foreach($locations as $loc)
                <option value="{{ $loc }}" {{ $booking->to_location == $loc ? 'selected' : '' }}>{{ $loc }}</option>
              @endforeach
            </select>
          </div>

          {{-- Travel Date --}}
          <div>
            <label class="block mb-1 font-medium">Travel Date</label>
            <input type="date" name="travel_date" value="{{ $booking->travel_date }}" class="w-full border px-3 py-2 rounded-lg" required>
          </div>

          {{-- Travel Time --}}
          <div>
            <label class="block mb-1 font-medium">Travel Time</label>
            <input type="time" name="travel_time" value="{{ $booking->travel_time }}" class="w-full border px-3 py-2 rounded-lg" required>
          </div>

          {{-- Vehicle Type --}}
          <div>
            <label class="block mb-1 font-medium">Vehicle Type</label>
            <select name="vehicle_type" class="w-full border px-3 py-2 rounded-lg" required>
              <option {{ $booking->vehicle_type=='Car (3 Adults)'?'selected':'' }}>Car (3 Adults)</option>
              <option {{ $booking->vehicle_type=='SUV (3 Adults)'?'selected':'' }}>SUV (3 Adults)</option>
              <option {{ $booking->vehicle_type=='Flat Roof Van (4-6 Adults)'?'selected':'' }}>Flat Roof Van (4-6 Adults)</option>
              <option {{ $booking->vehicle_type=='High Roof Van (7-9 Adults)'?'selected':'' }}>High Roof Van (7-9 Adults)</option>
              <option {{ $booking->vehicle_type=='Bus / Coach (15 / 25 / 45 Seater)'?'selected':'' }}>Bus / Coach (15 / 25 / 45 Seater)</option>
              <option {{ $booking->vehicle_type=='Luxury (3-4 Adults)'?'selected':'' }}>Luxury (3-4 Adults)</option>
            </select>
          </div>

          {{-- Trip Type --}}
          <div>
            <label class="block mb-1 font-medium">Trip Type</label>
            <select name="tour_id" class="w-full border px-3 py-2 rounded-lg">
              <option value="">-- Select Trip Type --</option>
              @foreach($services as $service)
                <option value="{{ $service->id }}" {{ $booking->tour_id == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
              @endforeach
            </select>
          </div>

          {{-- Status --}}
          <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded-lg">
              <option value="Pending" {{ $booking->status=='Pending'?'selected':'' }}>Pending</option>
              <option value="Confirmed" {{ $booking->status=='Confirmed'?'selected':'' }}>Confirmed</option>
              <option value="Cancelled" {{ $booking->status=='Cancelled'?'selected':'' }}>Cancelled</option>
            </select>
          </div>

          {{-- Price --}}
          <div>
            <label class="block mb-1 font-medium">Price</label>
            <input type="number" name="total_price" value="{{ $booking->total_price }}" class="w-full border px-3 py-2 rounded-lg" required>
          </div>

          {{-- Itinerary --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Itinerary</label>
            <textarea name="itinerary" class="w-full border px-3 py-2 rounded-lg">{{ $booking->itinerary }}</textarea>
          </div>

        </div>

        <button type="submit" class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Update Booking</button>

      </form>

    </main>
  </div>

</body>
</html>
