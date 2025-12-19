<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin | Manage Tours</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100 flex">

@include('admin.layouts.navbar')

<div class="flex-1 ml-64">

  {{-- HEADER --}}
  <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center fixed top-0 left-64 right-0 z-50">
    <h1 class="text-2xl font-semibold tracking-wide">Tours Dashboard</h1>
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

    {{-- CREATE NEW TOUR --}}
    <form method="POST" action="{{ route('admin.tours.store') }}" class="bg-white p-6 rounded-xl shadow mb-8" enctype="multipart/form-data">
      @csrf
      <h2 class="text-xl font-semibold mb-4">Create New Tour</h2>

      <div class="grid grid-cols-2 gap-4">

        {{-- CUSTOMER --}}
        <div class="col-span-2">
          <label class="block mb-1 font-medium">Customer</label>
          <select id="userSelect" name="user_id" class="w-full border px-3 py-2 rounded-lg">
            <option value="">-- Select Customer --</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}"
                data-phone="{{ $user->phone }}"
                data-email="{{ $user->email }}"
                data-adults="{{ $user->number_of_adults }}"
                data-kids="{{ $user->number_of_children }}"
                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->full_name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Autofill for selected customer --}}
        <div>
          <label class="block mb-1 font-medium">Phone</label>
          <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="w-full border px-3 py-2 rounded-lg" readonly>
        </div>

        <div>
          <label class="block mb-1 font-medium">Email</label>
          <input type="text" id="email" name="email" value="{{ old('email') }}" class="w-full border px-3 py-2 rounded-lg" readonly>
        </div>

        <div>
          <label class="block mb-1 font-medium">Adults</label>
          <input type="number" id="adults" name="adults" value="{{ old('adults') }}" class="w-full border px-3 py-2 rounded-lg" readonly>
        </div>

        <div>
          <label class="block mb-1 font-medium">Kids</label>
          <input type="number" id="kids" name="kids" value="{{ old('kids') }}" class="w-full border px-3 py-2 rounded-lg" readonly>
        </div>

        {{-- DESTINATION --}}
        <div>
          <label class="block mb-1 font-medium">Destination <span class="text-red-600">*</span></label>
          <select name="destination_id" class="w-full border px-3 py-2 rounded-lg" required>
            <option value="">-- Select Destination --</option>
            @foreach ($destinations as $dest)
              <option value="{{ $dest->id }}" {{ old('destination_id') == $dest->id ? 'selected' : '' }}>
                {{ $dest->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- TOUR NAME --}}
        <div>
          <label class="block mb-1 font-medium">Tour Name</label>
          <select id="tourSelect" name="tour_id" class="w-full border px-3 py-2 rounded-lg">
            <option value="">-- Select Tour --</option>
            @foreach ($tours as $tour)
              <option value="{{ $tour->id }}" 
                data-price="{{ $tour->price }}"
                data-commission="{{ $tour->commission }}"
                {{ old('tour_id') == $tour->id ? 'selected' : '' }}>
                {{ $tour->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- PRICE --}}
        <div>
          <label class="block mb-1 font-medium">Price</label>
          <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" class="w-full border px-3 py-2 rounded-lg" required>
        </div>

        {{-- PROFIT --}}
        <div>
          <label class="block mb-1 font-medium">Profit</label>
          <input type="number" step="0.01" name="commission" id="profit" value="{{ old('commission') }}" class="w-full border px-3 py-2 rounded-lg" readonly>
        </div>

        {{-- PAYMENT STATUS --}}
        <div>
          <label class="block mb-1 font-medium">Payment Status</label>
          <select name="payment_status" class="w-full border px-3 py-2 rounded-lg">
            <option value="Unpaid" {{ old('payment_status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
            <option value="Half Paid" {{ old('payment_status') == 'Half Paid' ? 'selected' : '' }}>Half Paid</option>
            <option value="Fully Paid" {{ old('payment_status') == 'Fully Paid' ? 'selected' : '' }}>Fully Paid</option>
          </select>
        </div>

        {{-- PAYMENT METHOD --}}
        <div>
          <label class="block mb-1 font-medium">Payment Method</label>
          <select name="payment_method" class="w-full border px-3 py-2 rounded-lg">
            <option value="Cash" {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>Cash</option>
            <option value="Online" {{ old('payment_method') == 'Online' ? 'selected' : '' }}>Online</option>
            <option value="Bank Transfer" {{ old('payment_method') == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
          </select>
        </div>

        {{-- RESERVATION STATUS --}}
        <div>
          <label class="block mb-1 font-medium">Reservation Status</label>
          <select name="reservation_status" class="w-full border px-3 py-2 rounded-lg">
            <option value="Pending" {{ old('reservation_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Confirmed" {{ old('reservation_status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="Cancelled" {{ old('reservation_status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
          </select>
        </div>

        {{-- PICKUP & DROPOFF ON SAME LINE --}}
        <div class="col-span-2 grid grid-cols-2 gap-4">
          <div>
            <label class="block mb-1 font-medium">Pickup Location</label>
            <input type="text" name="pickup_location" value="{{ old('pickup_location') }}" class="w-full border px-3 py-2 rounded-lg" required>
          </div>
          <div>
            <label class="block mb-1 font-medium">Dropoff Location</label>
            <input type="text" name="dropoff_location" value="{{ old('dropoff_location') }}" class="w-full border px-3 py-2 rounded-lg" required>
          </div>
        </div>

        <div>
          <label class="block mb-1 font-medium">Travel Date</label>
          <input type="date" name="travel_date" value="{{ old('travel_date') }}" class="w-full border px-3 py-2 rounded-lg">
        </div>

        <div>
          <label class="block mb-1 font-medium">Travel Time</label>
          <input type="time" name="travel_time" value="{{ old('travel_time') }}" class="w-full border px-3 py-2 rounded-lg">
        </div>

        {{-- VEHICLE TYPE DROPDOWN --}}
        <div>
          <label class="block mb-1 font-medium">Vehicle Type</label>
          <select name="vehicle_type" class="w-full border px-3 py-2 rounded-lg">
            <option value="">-- Select Vehicle --</option>
            <option>Car (3 Adults)</option>
            <option>SUV (3 Adults)</option>
            <option>Flat Roof Van (4-6 Adults)</option>
            <option>High Roof Van (7-9 Adults)</option>
            <option>Bus / Coach (15 / 25 / 45 Seater)</option>
            <option>Luxury (3-4 Adults)</option>
            <option>Safari Jeep</option>
            <option>Boat</option>
          </select>
        </div>

        {{-- FLIGHT NUMBER OPTIONAL --}}
        <div>
          <label class="block mb-1 font-medium">Flight Number (Optional)</label>
          <input type="text" name="flight_number" value="{{ old('flight_number') }}" class="w-full border px-3 py-2 rounded-lg">
        </div>

        <div class="col-span-2">
          <label class="block mb-1 font-medium">Description</label>
          <textarea name="description" rows="3" class="w-full border px-3 py-2 rounded-lg">{{ old('description') }}</textarea>
        </div>

        <div class="col-span-2">
          <label class="block mb-1 font-medium">Image / File</label>
          <input type="file" name="image" class="w-full border px-3 py-2 rounded-lg">
        </div>

      </div>

      <button type="submit" class="mt-4 bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
        Create Tour
      </button>
    </form>

    {{-- TOURS TABLE --}}
    <div class="bg-white shadow rounded-xl p-4 overflow-x-auto">
      <h2 class="text-xl font-semibold mb-4">Existing Tours</h2>

      <table class="min-w-full bg-white border">
        <thead>
          <tr class="bg-gray-100">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Tour Name</th>
            <th class="border px-4 py-2">Destination</th>
            <th class="border px-4 py-2">Pickup</th>
            <th class="border px-4 py-2">Dropoff</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Vehicle</th>
            <th class="border px-4 py-2">Flight</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Profit</th>
            <th class="border px-4 py-2">Customers</th>
            <th class="border px-4 py-2">Actions</th>
          </tr>
        </thead>

        <tbody>
          @foreach($tours as $tour)
          <tr class="border-b hover:bg-gray-50">
            <td class="border px-4 py-2">{{ $tour->id }}</td>
            <td class="border px-4 py-2">{{ $tour->name }}</td>
            <td class="border px-4 py-2">{{ $tour->destination->name ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $tour->pickup_location }}</td>
            <td class="border px-4 py-2">{{ $tour->dropoff_location }}</td>
            <td class="border px-4 py-2">{{ $tour->travel_date }} {{ $tour->travel_time }}</td>
            <td class="border px-4 py-2">{{ $tour->vehicle_type }}</td>
            <td class="border px-4 py-2">{{ $tour->flight_number ?? '-' }}</td>
            <td class="border px-4 py-2">LKR {{ number_format($tour->price, 2) }}</td>
            <td class="border px-4 py-2">LKR {{ number_format($tour->commission, 2) }}</td>

            <td class="border px-4 py-2">
              @foreach($tour->bookings as $booking)
                <span class="block">{{ $booking->user->full_name }}</span>
              @endforeach
            </td>

            <td class="border px-4 py-2 text-center">
              <a href="{{ route('admin.tours.edit', $tour->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded mb-2 inline-block">Edit</a>
              <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
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
$(document).ready(function() {
    // Auto-fill price/profit if a tour is selected
    function updateTourFields() {
        let selectedTour = $('#tourSelect option:selected');
        $('#price').val(selectedTour.data('price') || '');
        $('#profit').val(selectedTour.data('commission') || '');
    }
    updateTourFields();

    $('#tourSelect').change(updateTourFields);

    // Customer autofill
    function updateCustomerFields() {
        let selected = $('#userSelect option:selected');
        $('#phone').val(selected.data('phone') || '');
        $('#email').val(selected.data('email') || '');
        $('#adults').val(selected.data('adults') || '');
        $('#kids').val(selected.data('kids') || '');
    }
    updateCustomerFields();

    $('#userSelect').change(updateCustomerFields);
});
</script>

</body>
</html>
