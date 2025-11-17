<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Booking Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 flex">

  {{-- Sidebar --}}
  @include('admin.layouts.navbar')

  <div class="flex-1 ml-64">

    <!-- Header -->
    <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center sticky top-0 z-40">
        <h1 class="text-2xl font-semibold tracking-wide">Booking Dashboard</h1>
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

      {{-- Booking Form --}}
      <form method="POST" action="{{ route('admin.bookings.store') }}" class="bg-white p-6 rounded-xl shadow mb-8">
        @csrf
        <h2 class="text-xl font-semibold mb-4">Create New Booking</h2>

        <div class="grid grid-cols-2 gap-4">

          {{-- Customer Name --}}
          <div>
            <label class="block mb-1 font-medium">Customer Name</label>
            <select id="userSelect" name="user_id" class="w-full border px-3 py-2 rounded-lg" required>
              <option value="">-- Select Customer --</option>
              @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->full_name ?? $user->name }}</option>
              @endforeach
            </select>
          </div>

          {{-- Phone (auto-fill) --}}
          <div>
            <label class="block mb-1 font-medium">Phone</label>
            <input type="text" id="phone" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          {{-- Email (auto-fill) --}}
          <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" id="email" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          {{-- Adults --}}
          <div>
            <label class="block mb-1 font-medium">Number of Adults</label>
            <input type="number" id="adults" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          {{-- Kids --}}
          <div>
            <label class="block mb-1 font-medium">Number of Kids</label>
            <input type="number" id="kids" class="w-full border px-3 py-2 rounded-lg" readonly>
          </div>

          {{-- From & To (same row) --}}
          <div class="col-span-2 flex gap-4">
            <div class="flex-1">
              <label class="block mb-1 font-medium">From</label>
              <select name="from_location" class="w-full border px-3 py-2 rounded-lg" required>
                <option value="">-- Select Location --</option>
                @foreach($locations as $loc)
                  <option value="{{ $loc }}">{{ $loc }}</option>
                @endforeach
              </select>
            </div>

            <div class="flex-1">
              <label class="block mb-1 font-medium">To</label>
              <select name="to_location" class="w-full border px-3 py-2 rounded-lg" required>
                <option value="">-- Select Location --</option>
                @foreach($locations as $loc)
                  <option value="{{ $loc }}">{{ $loc }}</option>
                @endforeach
              </select>
            </div>
          </div>

          {{-- Trip Type --}}
          <div>
            <label class="block mb-1 font-medium">Travel Type</label>
            <select name="tour_id" class="w-full border px-3 py-2 rounded-lg" required>
              <option value="">-- Select Trip Type --</option>
              @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->title }}</option>
              @endforeach
            </select>
          </div>

          {{-- Travel Date --}}
          <div>
            <label class="block mb-1 font-medium">Travel Date</label>
            <input type="date" name="travel_date" class="w-full border px-3 py-2 rounded-lg" required>
          </div>

          {{-- Travel Time --}}
          <div>
            <label class="block mb-1 font-medium">Travel Time</label>
            <input type="time" name="travel_time" class="w-full border px-3 py-2 rounded-lg" required>
          </div>

          {{-- Vehicle Type --}}
          <div>
            <label class="block mb-1 font-medium">Vehicle Type</label>
            <select name="vehicle_type" class="w-full border px-3 py-2 rounded-lg" required>
              <option value="">-- Select Vehicle --</option>
              <option>Car (3 Adults)</option>
              <option>SUV (3 Adults)</option>
              <option>Flat Roof Van (4-6 Adults)</option>
              <option>High Roof Van (7-9 Adults)</option>
              <option>Bus / Coach (15 / 25 / 45 Seater)</option>
              <option>Luxury (3-4 Adults)</option>
            </select>
          </div>

          {{-- Itinerary --}}
          <div class="col-span-2">
            <label class="block mb-1 font-medium">Itinerary</label>
            <textarea name="itinerary" class="w-full border px-3 py-2 rounded-lg"></textarea>
          </div>

          {{-- Price --}}
          <div>
            <label class="block mb-1 font-medium">Price</label>
            <input type="number" step="0.01" name="price" class="w-full border px-3 py-2 rounded-lg" required>
          </div>

        </div>

        <button type="submit" class="mt-4 bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Create Reservation</button>
      </form>

      {{-- TABS ADDED HERE --}}
      <div class="bg-white p-4 rounded-xl shadow mb-4">
        <div class="flex space-x-4 border-b pb-2">
            <button class="tab-btn active-tab px-4 py-2 font-medium" data-tab="all">All</button>
            <button class="tab-btn px-4 py-2 font-medium" data-tab="upcoming">Upcoming</button>
            <button class="tab-btn px-4 py-2 font-medium" data-tab="today">Today</button>
            <button class="tab-btn px-4 py-2 font-medium" data-tab="previous">Previous</button>
        </div>
      </div>

      {{-- Existing Bookings Table --}}
      <div class="bg-white shadow rounded-xl p-4 overflow-x-auto">
        <h2 class="text-xl font-semibold mb-4">Existing Bookings</h2>

        <table class="min-w-full border text-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="border px-4 py-2">#</th>
              <th class="border px-4 py-2">Customer</th>
              <th class="border px-4 py-2">Phone</th>
              <th class="border px-4 py-2">Trip Type</th>
              <th class="border px-4 py-2">From - To</th>
              <th class="border px-4 py-2">Travel Date</th>
              <th class="border px-4 py-2">Travel Time</th>
              <th class="border px-4 py-2">Vehicle</th>
              <th class="border px-4 py-2">Itinerary</th>
              <th class="border px-4 py-2">Price</th>
              <th class="border px-4 py-2">Action</th>
            </tr>
          </thead>

          <tbody id="bookingTableBody">
            @forelse($bookings as $booking)
              <tr class="hover:bg-gray-50 booking-row"
                  data-date="{{ $booking->travel_date }}">
                <td class="border px-4 py-2">{{ $loop->iteration + ($bookings->currentPage()-1) * $bookings->perPage() }}</td>
                <td class="border px-4 py-2">{{ $booking->user->full_name ?? $booking->user->name ?? 'N/A' }}</td>
                <td class="border px-4 py-2">{{ $booking->user->phone ?? 'N/A' }}</td>
                <td class="border px-4 py-2">{{ $booking->type }}</td>
                <td class="border px-4 py-2">{{ $booking->from_location }} - {{ $booking->to_location }}</td>
                <td class="border px-4 py-2">{{ $booking->travel_date }}</td>
                <td class="border px-4 py-2">{{ $booking->travel_time }}</td>
                <td class="border px-4 py-2">{{ $booking->vehicle_type }}</td>
                <td class="border px-4 py-2">{{ $booking->itinerary }}</td>
                <td class="border px-4 py-2">${{ $booking->total_price }}</td>
                <td class="border px-4 py-2 text-center flex justify-center gap-2">
                  <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                    class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition">
                    Edit
                  </a>
                  <form method="POST" action="{{ route('admin.bookings.destroy', $booking->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="11" class="text-center py-4">No bookings found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        <div class="mt-4">
          {{ $bookings->links() }}
        </div>
      </div>

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
      $('#adults').val(user?.number_of_adults || '');
      $('#kids').val(user?.number_of_kids || '');
    });

    // Tabs filtering
    $('.tab-btn').on('click', function () {
        $('.tab-btn').removeClass('active-tab');
        $(this).addClass('active-tab');

        const tab = $(this).data('tab');
        const today = new Date().toISOString().split('T')[0];

        $('.booking-row').each(function () {
            const rowDate = $(this).data('date');

            if (tab === "all") {
                $(this).show();
            } 
            else if (tab === "upcoming") {
                (rowDate > today) ? $(this).show() : $(this).hide();
            } 
            else if (tab === "today") {
                (rowDate === today) ? $(this).show() : $(this).hide();
            } 
            else if (tab === "previous") {
                (rowDate < today) ? $(this).show() : $(this).hide();
            }
        });
    });

    $('.tab-btn[data-tab="all"]').click();
  </script>

  <style>
    .tab-btn {
        border-bottom: 2px solid transparent;
        padding-bottom: 6px;
        cursor: pointer;
    }
    .active-tab {
        border-color: #002D62;
        color: #002D62;
        font-weight: 600;
    }
  </style>

</body>
</html>
