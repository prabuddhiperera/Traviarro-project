<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Traviaro Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

  <!-- Sidebar -->
  <aside class="bg-gray-900 text-white w-64 min-h-screen p-6 fixed left-0 top-0 flex flex-col justify-between">
    
    <!-- Top section -->
    <div>
      <!-- Logo and title -->
      <div class="flex items-center space-x-3 mb-10">
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="w-12 h-12 rounded-full border border-gray-700">
        <h1 class="text-2xl font-semibold tracking-wide">TRIVARRO</h1>
      </div>

      <!-- Navigation Links -->
      <nav class="space-y-3">
        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded-lg hover:bg-indigo-600 transition">Dashboard</a>
        <a href="{{ route('admin.bookings') }}" class="block py-2 px-4 rounded-lg hover:bg-indigo-600 transition">Manage Bookings</a>
        <a href="manage-customers.html" class="block py-2 px-4 rounded-lg hover:bg-indigo-600 transition">Manage Customers</a>
        <a href="manage-tours.html" class="block py-2 px-4 rounded-lg hover:bg-indigo-600 transition">Manage Tours</a>
        <a href="manage-services.html" class="block py-2 px-4 rounded-lg hover:bg-indigo-600 transition">Manage Services</a>
        <a href="{{ route('admin.charts') }}" class="block py-2 px-4 rounded-lg hover:bg-indigo-600 transition">Charts</a>
      </nav>
    </div>

    <!-- Logout -->
    <div class="mt-10">
      <button 
        onclick="handleLogout()" 
        class="w-full bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg font-semibold transition">
        Logout
      </button>
    </div>
  </aside>


  <!-- JS -->
  <script>
    function handleLogout() {
      alert('Logged out successfully!');
      window.location.href = 'login.html';
    }
  </script>

</body>
</html>
