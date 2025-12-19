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

    <!-- Header -->
    <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center sticky top-0 z-40">
        <h1 class="text-2xl font-semibold tracking-wide">Edit Tour</h1>
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

      {{-- Errors --}}
      @if ($errors->any())
          <div class="bg-red-100 text-red-800 p-3 rounded mb-4 shadow">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form method="POST" action="{{ route('admin.tours.update', $tour->id) }}" class="bg-white p-6 rounded-xl shadow" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold mb-4">Edit Tour #{{ $tour->id }}</h2>

        <div class="grid grid-cols-2 gap-4">

          {{-- Customer --}}
          <div>
            <label class="block mb-1 font-medium">Customer</label>
            <select id="userSelect" name="user_id" class="w-full border px-3 py-2 rounded-lg" required>
              <option value="">-- Select Customer --</option>
              @foreach($users as $user)
                <option value="{{ $user->id }}"
                        data-phone="{{ $user->phone ?? '' }}"
                        data-email="{{ $user->email ?? '' }}"
                        data-adults="{{ $user->number_of_adults ?? 0 }}"
                        data-kids="{{ $user->number_of_children ?? 0 }}"
                        {{ $tour->user_id == $user->id ? 'selected' : '' }}>
                  {{ $user->full_name ?? $user->name }}
                </option>
              @endforeach
            </select>
          </div>

          {{-- Auto-filled customer fields --}}
          <div>
            <label class="block mb-1 font-medium">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $tour->phone) }}" class="w-full border px-3 py-2 rounded-lg bg-gray-100" readonly>
          </div>

          <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $tour->email) }}" class="w-full border px-3 py-2 rounded-lg bg-gray-100" readonly>
          </div>

          <div>
            <label class="block mb-1 font-medium">Adults</label>
            <input type="number" id="adults" name="adults" value="{{ old('adults', $tour->number_of_adults) }}" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          <div>
            <label class="block mb-1 font-medium">Kids</label>
            <input type="number" id="kids" name="kids" value="{{ old('kids', $tour->number_of_children) }}" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          {{-- Tour Selection --}}
          <div>
            <label class="block mb-1 font-medium">Tour Name</label>
            <select id="tourSelect" name="tour_id" class="w-full border px-3 py-2 rounded-lg" required>
              <option value="">-- Select Tour --</option>
              @foreach($tours as $t)
                <option value="{{ $t->id }}" data-price="{{ $t->price }}" data-commission="{{ $t->commission }}" {{ $tour->tour_id == $t->id ? 'selected' : '' }}>
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
                <option value="{{ $destination->id }}" {{ $tour->destination_id == $destination->id ? 'selected' : '' }}>
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
            <input type="number" step="0.01" name="commission" id="profit" value="{{ old('commission', $tour->commission) }}" class="w-full border px-3 py-2 rounded-lg bg-gray-100" readonly>
          </div>

          {{-- Payment & Reservation Status --}}
          <div>
            <label class="block mb-1 font-medium">Payment Status</label>
            <select name="payment_status" class="w-full border px-3 py-2 rounded-lg">
              <option value="Unpaid" {{ $tour->payment_status == 'Unpaid' ? 'selected':'' }}>Unpaid</option>
              <option value="Half Paid" {{ $tour->payment_status == 'Half Paid' ? 'selected':'' }}>Half Paid</option>
              <option value="Fully Paid" {{ $tour->payment_status == 'Fully Paid' ? 'selected':'' }}>Fully Paid</option>
            </select>
          </div>

          <div>
            <label class="block mb-1 font-medium">Payment Method</label>
            <select name="payment_method" class="w-full border px-3 py-2 rounded-lg">
              <option value="Cash" {{ $tour->payment_method == 'Cash' ? 'selected':'' }}>Cash</option>
              <option value="Online" {{ $tour->payment_method == 'Online' ? 'selected':'' }}>Online</option>
              <option value="Bank Transfer" {{ $tour->payment_method == 'Bank Transfer' ? 'selected':'' }}>Bank Transfer</option>
            </select>
          </div>

          <div>
            <label class="block mb-1 font-medium">Reservation Status</label>
            <select name="reservation_status" class="w-full border px-3 py-2 rounded-lg">
              <option value="Pending" {{ $tour->reservation_status == 'Pending' ? 'selected':'' }}>Pending</option>
              <option value="Confirmed" {{ $tour->reservation_status == 'Confirmed' ? 'selected':'' }}>Confirmed</option>
              <option value="Cancelled" {{ $tour->reservation_status == 'Cancelled' ? 'selected':'' }}>Cancelled</option>
            </select>
          </div>

          {{-- Pickup & Dropoff --}}
          <div class="col-span-2 grid grid-cols-2 gap-4">
            <div>
              <label class="block mb-1 font-medium">Pickup Location</label>
              <input type="text" name="pickup_location" value="{{ old('pickup_location', $tour->pickup_location) }}" class="w-full border px-3 py-2 rounded-lg">
            </div>
            <div>
              <label class="block mb-1 font-medium">Dropoff Location</label>
              <input type="text" name="dropoff_location" value="{{ old('dropoff_location', $tour->dropoff_location) }}" class="w-full border px-3 py-2 rounded-lg">
            </div>
          </div>

          {{-- Date & Time --}}
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
              <option value="Car (3 Adults)" {{ $tour->vehicle_type == 'Car (3 Adults)' ? 'selected':'' }}>Car (3 Adults)</option>
              <option value="SUV (3 Adults)" {{ $tour->vehicle_type == 'SUV (3 Adults)' ? 'selected':'' }}>SUV (3 Adults)</option>
              <option value="Flat Roof Van (4-6 Adults)" {{ $tour->vehicle_type == 'Flat Roof Van (4-6 Adults)' ? 'selected':'' }}>Flat Roof Van (4-6 Adults)</option>
              <option value="High Roof Van (7-9 Adults)" {{ $tour->vehicle_type == 'High Roof Van (7-9 Adults)' ? 'selected':'' }}>High Roof Van (7-9 Adults)</option>
              <option value="Bus / Coach (15 / 25 / 45 Seater)" {{ $tour->vehicle_type == 'Bus / Coach (15 / 25 / 45 Seater)' ? 'selected':'' }}>Bus / Coach (15 / 25 / 45 Seater)</option>
              <option value="Luxury (3-4 Adults)" {{ $tour->vehicle_type == 'Luxury (3-4 Adults)' ? 'selected':'' }}>Luxury (3-4 Adults)</option>
              <option value="Safari Jeep" {{ $tour->vehicle_type == 'Safari Jeep' ? 'selected':'' }}>Safari Jeep</option>
              <option value="Boat" {{ $tour->vehicle_type == 'Boat' ? 'selected':'' }}>Boat</option>
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
            <textarea name="description" rows="3" class="w-full border px-3 py-2 rounded-lg">{{ old('description', $tour->description) }}</textarea>
          </div>

          {{-- Image --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Image / File</label>
            <input type="file" name="image" class="w-full border px-3 py-2 rounded-lg">
            @if($tour->image)
              <img src="{{ asset('uploads/' . $tour->image) }}" class="mt-2 w-48 h-32 object-cover rounded-lg shadow">
            @endif
          </div>

        </div>

        <button type="submit" class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
          Update Tour
        </button>
      </form>

    </main>
  </div>

  <script>
    // Auto-fill user details
    const users = @json($users);

    $('#userSelect').change(function() {
      const userId = $(this).val();
      const user = users.find(u => u.id == userId);

      $('#phone').val(user?.phone || '');
      $('#email').val(user?.email || '');
      $('#adults').val(user?.number_of_adults || 0);
      $('#kids').val(user?.number_of_children || 0);
    });

    // Autofill price & commission if admin selects existing tour
    $('#tourSelect').change(function() {
      const selected = $(this).find(':selected');
      const price = parseFloat(selected.data('price')) || 0;
      const commission = parseFloat(selected.data('commission')) || 0;

      if(price > 0) $('#price').val(price.toFixed(2));
      if(commission > 0) $('#profit').val(commission.toFixed(2));
    });

    // Auto-calc commission (20% default)
    $('#price').on('input', function() {
      const price = parseFloat($(this).val()) || 0;
      const commissionRate = 0.20;
      $('#profit').val((price * commissionRate).toFixed(2));
    });
  </script>

</body>
</html>
