<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Tour | Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 flex">

  {{-- Sidebar --}}
  @include('admin.layouts.navbar')

  <div class="flex-1 ml-64">

    <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center fixed top-0 left-64 right-0 z-50">
      <h1 class="text-2xl font-semibold tracking-wide">Edit Tour</h1>
    </header>

    <main class="p-6 mt-[88px]">

      {{-- Success Message --}}
      @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 shadow">
          {{ session('success') }}
        </div>
      @endif

      {{-- Validation Errors --}}
      @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4 shadow">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Edit Tour Form --}}
      <form method="POST" action="{{ route('admin.tours.update', $tour->id) }}" class="bg-white p-6 rounded-xl shadow mb-8" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2 class="text-xl font-semibold mb-4">Edit Tour Details</h2>

        <div class="grid grid-cols-2 gap-4">

          {{-- Customer --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Customer</label>
            <select id="userSelect" name="user_id" class="w-full border px-3 py-2 rounded-lg" required>
              <option value="">-- Select Customer --</option>
              @foreach($users as $user)
                <option value="{{ $user->id }}"
                  data-phone="{{ $user->phone ?? '' }}"
                  data-email="{{ $user->email ?? '' }}"
                  data-adults="{{ $user->number_of_adults ?? 0 }}"
                  data-kids="{{ $user->number_of_children ?? 0 }}"
                  {{ (old('user_id', $tour->user_id) == $user->id) ? 'selected' : '' }}>
                  {{ $user->full_name ?? $user->name }}
                </option>
              @endforeach
            </select>
          </div>

          {{-- Auto-filled customer fields --}}
          <div>
            <label class="block mb-1 font-medium">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $tour->user->phone ?? '') }}" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $tour->user->email ?? '') }}" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          <div>
            <label class="block mb-1 font-medium">Adults</label>
            <input type="number" id="adults" name="adults" value="{{ old('adults', $tour->number_of_adults) }}" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          <div>
            <label class="block mb-1 font-medium">Kids</label>
            <input type="number" id="kids" name="kids" value="{{ old('kids', $tour->number_of_children) }}" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          {{-- Tour & Destination --}}
          <div>
            <label class="block mb-1 font-medium">Tour Name</label>
            <select id="tourSelect" name="tour_id" class="w-full border px-3 py-2 rounded-lg" required>
              <option value="">-- Select Tour --</option>
              @foreach($tours as $t)
                <option value="{{ $t->id }}" data-price="{{ $t->price }}" data-commission="{{ $t->commission }}" {{ (old('tour_id', $tour->tour_id) == $t->id) ? 'selected' : '' }}>
                  {{ $t->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block mb-1 font-medium">Destination</label>
            <select name="destination_id" class="w-full border px-3 py-2 rounded-lg" required>
              <option value="">-- Select Destination --</option>
              @foreach($destinations as $destination)
                <option value="{{ $destination->id }}" {{ (old('destination_id', $tour->destination_id) == $destination->id) ? 'selected' : '' }}>
                  {{ $destination->name }}
                </option>
              @endforeach
            </select>
          </div>

          {{-- Price & Commission --}}
          <div>
            <label class="block mb-1 font-medium">Price (LKR)</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $tour->price) }}" class="w-full border px-3 py-2 rounded-lg" required>
          </div>

          <div>
            <label class="block mb-1 font-medium">Profit / Commission (LKR)</label>
            <input type="number" step="0.01" name="commission" id="profit" value="{{ old('commission', $tour->commission) }}" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          {{-- Payment & Reservation Status --}}
          <div>
            <label class="block mb-1 font-medium">Payment Status</label>
            <select name="payment_status" class="w-full border px-3 py-2 rounded-lg">
              @foreach(['Unpaid','Half Paid','Fully Paid'] as $status)
                <option value="{{ $status }}" {{ (old('payment_status', $tour->payment_status) == $status) ? 'selected' : '' }}>{{ $status }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block mb-1 font-medium">Payment Method</label>
            <select name="payment_method" class="w-full border px-3 py-2 rounded-lg">
              @foreach(['Cash','Online','Bank Transfer'] as $method)
                <option value="{{ $method }}" {{ (old('payment_method', $tour->payment_method) == $method) ? 'selected' : '' }}>{{ $method }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block mb-1 font-medium">Reservation Status</label>
            <select name="reservation_status" class="w-full border px-3 py-2 rounded-lg">
              @foreach(['Pending','Confirmed','Cancelled'] as $resStatus)
                <option value="{{ $resStatus }}" {{ (old('reservation_status', $tour->reservation_status) == $resStatus) ? 'selected' : '' }}>{{ $resStatus }}</option>
              @endforeach
            </select>
          </div>

          {{-- Pickup & Dropoff --}}
          <div class="col-span-2 flex gap-4">
            <div class="flex-1">
              <label class="block mb-1 font-medium">Pickup Location</label>
              <input type="text" name="pickup_location" value="{{ old('pickup_location', $tour->pickup_location) }}" class="w-full border px-3 py-2 rounded-lg">
            </div>
            <div class="flex-1">
              <label class="block mb-1 font-medium">Dropoff Location</label>
              <input type="text" name="dropoff_location" value="{{ old('dropoff_location', $tour->dropoff_location) }}" class="w-full border px-3 py-2 rounded-lg">
            </div>
          </div>

          {{-- Date, Time --}}
          <div>
            <label class="block mb-1 font-medium">Travel Date</label>
            <input type="date" name="travel_date" value="{{ old('travel_date', $tour->travel_date) }}" class="w-full border px-3 py-2 rounded-lg">
          </div>

          <div>
            <label class="block mb-1 font-medium">Travel Time</label>
            <input type="time" name="travel_time" value="{{ old('travel_time', $tour->travel_time) }}" class="w-full border px-3 py-2 rounded-lg">
          </div>

          {{-- Vehicle --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Vehicle Type</label>
            <select name="vehicle_type" class="w-full border px-3 py-2 rounded-lg">
              @foreach([
                'Car (3 Adults)',
                'SUV (3 Adults)',
                'Flat Roof Van (4-6 Adults)',
                'High Roof Van (7-9 Adults)',
                'Bus / Coach (15 / 25 / 45 Seater)',
                'Luxury (3-4 Adults)',
                'Safari Jeep',
                'Boat'
              ] as $vehicle)
                <option value="{{ $vehicle }}" {{ (old('vehicle_type', $tour->vehicle_type) == $vehicle) ? 'selected' : '' }}>{{ $vehicle }}</option>
              @endforeach
            </select>
          </div>

          {{-- Flight Number --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Flight Number (Optional)</label>
            <input type="text" name="flight_number" value="{{ old('flight_number', $tour->flight_number) }}" class="w-full border px-3 py-2 rounded-lg">
          </div>

          {{-- Description --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded-lg" rows="3">{{ old('description', $tour->description) }}</textarea>
          </div>

          {{-- Image --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Image / File</label>
            <input type="file" name="image" class="w-full border px-3 py-2 rounded-lg">
            @if($tour->image)
              <img src="{{ asset('storage/' . $tour->image) }}" class="mt-2 w-48 h-32 object-cover rounded-lg shadow">
            @endif
          </div>

        </div>

        <button type="submit" class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Update Tour</button>
      </form>

    </main>
  </div>

  <script>
    // Auto-fill customer info
    $('#userSelect').change(function() {
      const selected = $(this).find(':selected');
      $('#phone').val(selected.data('phone') || '');
      $('#email').val(selected.data('email') || '');
      $('#adults').val(selected.data('adults') || 0);
      $('#kids').val(selected.data('kids') || 0);
    });

    // Auto-fill price and commission if tour selected
    $('#tourSelect').change(function() {
      const selected = $(this).find(':selected');
      const price = parseFloat(selected.data('price')) || 0;
      const commission = parseFloat(selected.data('commission')) || 0;

      if(price > 0) $('#price').val(price.toFixed(2)).trigger('input');
      if(commission > 0) $('#profit').val(commission.toFixed(2));
    });

    // Auto-calc commission 20%
    $('#price').on('input', function() {
      const price = parseFloat($(this).val()) || 0;
      const commission = price * 0.20;
      $('#profit').val(commission.toFixed(2));
    });

    // Trigger change on page load to populate fields
    $(document).ready(function() {
      $('#userSelect').trigger('change');
      $('#tourSelect').trigger('change');
    });
  </script>

</body>
</html>
