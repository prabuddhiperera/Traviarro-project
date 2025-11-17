<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tours | Traviaro</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  @include('navigation-menu')

  <!-- Hero Section -->
  <section class="relative bg-cover bg-center h-[90vh]" style="background-image: url('/img/tours.jpg');">
    <div class="absolute inset-0 bg-[#006994]/40"></div>
    <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
      <h2 class="text-5xl md:text-6xl font-extrabold font-['Libre_Baskerville',serif] mb-4">Explore Our Tours</h2>
      <p class="max-w-2xl mx-auto text-lg text-white">
        Discover breathtaking destinations and unforgettable experiences — customized to your dream journey.
      </p>
    </div>
  </section>

  <!-- Tour Listing -->
  <section class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-8">
    @foreach($tours as $tour)
      <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
        <img src="{{ $tour->image ?? 'img/tours/tours-fam.jpg' }}" alt="{{ $tour->name }}" class="w-full h-56 object-cover rounded-xl mb-4">
        <h3 class="text-xl font-bold mb-2">{{ $tour->name }}</h3>
        <p class="text-gray-600 mb-4">{{ $tour->duration ?? '7 Days • Beaches, Culture, and Nature' }}</p>
        <a href="{{ route('tours.show', ['id' => $tour->id]) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            View Details
        </a>
      </div>
    @endforeach
  </section>

  <!-- Customize Your Tour Section -->
  <section class="bg-[#e0f7fa] py-12">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-blue-700 mb-6">Want to Customize Your Tour?</h2>
      <p class="text-lg text-gray-700 mb-6">
        We are flexible and ensure your tour perfectly fits your preferences and makes you happy.
        Whether you want to add destinations, extend days, or tailor activities — we've got you covered!
      </p>

      <table class="w-full max-w-lg mx-auto border border-blue-300 rounded-lg mb-6">
        <thead class="bg-blue-600 text-white">
          <tr>
            <th class="p-3 text-left">Option</th>
            <th class="p-3 text-left">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr class="border-b">
            <td class="p-3">Personalize your itinerary</td>
            <td class="p-3">
              <button id="show-tour-form-btn" class="flex items-center gap-2 bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700">
                <span class="text-lg font-bold">+</span> Customize Tour
              </button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Tours Form -->
      <div id="tours-form" class="hidden py-12">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl p-8">
          <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Tours Request</h3>
          <form id="tourRequestForm" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- From -->
            <div>
              <label class="block text-gray-600 mb-2 font-medium">From</label>
              <select name="From" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
                <option>Bandaranaike International Airport</option>
                <option>Ratmalana Airport</option>
                <option>Mount Lavinia</option>
                <option>Wadduwa</option>
                <option>Waskaduwa</option>
                <option>Kalutara</option>
                <option>Beruwala</option>
                <option>Aluthgama</option>
                <option>Bentota</option>
                <option>Induruwa</option>
                <option>Kosgoda</option>
                <option>Ahungalla</option>
                <option>Balapitiya</option>
                <option>Ambalangoda</option>
                <option>Akurala</option>
                <option>Meetiyagoda</option>
                <option>Hikkaduwa</option>
                <option>Dodanduwa</option>
                <option>Mirissa</option>
                <option>Unawatuna</option>
                <option>Talpe</option>
                <option>Koggala</option>
                <option>Habaraduwa</option>
                <option>Ahangama</option>
                <option>Weligama</option>
                <option>Matara</option>
                <option>Dondra</option>
                <option>Talalla</option>
                <option>Hiriketiya</option>
                <option>Dickwella</option>
                <option>Tangalle</option>
                <option>Ridiyagama</option>
                <option>Udawalawe</option>
                <option>Yala (Kirinda)</option>
                <option>Tissamaharama</option>
                <option>Weerawila</option>
                <option>Kataragama</option>
                <option>Haputale</option>
                <option>Bandarawela</option>
                <option>Ella</option>
                <option>Ratnapura</option>
                <option>Sinharaja</option>
                <option>Katunayake</option>
                <option>Negombo</option>
                <option>Arugambay</option>
                <option>Pinnawala</option>
                <option>Habarana</option>
                <option>Wipattu</option>
                <option>Kalpitiya</option>
                <option>Nilaveli</option>
                <option>Kandalama</option>
                <option>Gal Oya</option>
                <option>Digana</option>
                <option>Pottuvil</option>
                <option>Colombo</option>
                <option>Kandy</option>
                <option>Galle</option>
                <option>Jaffna</option>
                <option>Anuradhapura</option>
                <option>Polonnaruwa</option>
                <option>Trincomalee</option>
                <option>Batticaloa</option>
                <option>Negombo</option>
                <option>Kurunegala</option>
                <option>Ratnapura</option>
                <option>Nuwara Eliya</option>
                <option>Matale</option>
                <option>Badulla</option>
                <option>Kalmunai</option>
                <option>Dambulla</option>
                <option>Moratuwa</option>
                <option>Kalutara</option>
                <option>Kegalle</option>
                <option>Matara</option>
                <option>Gampaha</option>
                <option>Puttalam</option>
                <option>Vavuniya</option>
                <option>Ampara</option>
                <option>Hambantota</option>
                <option>Sigiriya</option>
                <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>

            <!-- To -->
            <div>
              <label class="block text-gray-600 mb-2 font-medium">To</label>
              <select name="To" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
                <option>Bandaranaike International Airport</option>
                <option>Ratmalana Airport</option>
                <option>Mount Lavinia</option>
                <option>Wadduwa</option>
                <option>Waskaduwa</option>
                <option>Kalutara</option>
                <option>Beruwala</option>
                <option>Aluthgama</option>
                <option>Bentota</option>
                <option>Induruwa</option>
                <option>Kosgoda</option>
                <option>Ahungalla</option>
                <option>Balapitiya</option>
                <option>Ambalangoda</option>
                <option>Akurala</option>
                <option>Meetiyagoda</option>
                <option>Hikkaduwa</option>
                <option>Dodanduwa</option>
                <option>Mirissa</option>
                <option>Unawatuna</option>
                <option>Talpe</option>
                <option>Koggala</option>
                <option>Habaraduwa</option>
                <option>Ahangama</option>
                <option>Weligama</option>
                <option>Matara</option>
                <option>Dondra</option>
                <option>Talalla</option>
                <option>Hiriketiya</option>
                <option>Dickwella</option>
                <option>Tangalle</option>
                <option>Ridiyagama</option>
                <option>Udawalawe</option>
                <option>Yala (Kirinda)</option>
                <option>Tissamaharama</option>
                <option>Weerawila</option>
                <option>Kataragama</option>
                <option>Haputale</option>
                <option>Bandarawela</option>
                <option>Ella</option>
                <option>Ratnapura</option>
                <option>Sinharaja</option>
                <option>Katunayake</option>
                <option>Negombo</option>
                <option>Arugambay</option>
                <option>Pinnawala</option>
                <option>Habarana</option>
                <option>Wipattu</option>
                <option>Kalpitiya</option>
                <option>Nilaveli</option>
                <option>Kandalama</option>
                <option>Gal Oya</option>
                <option>Digana</option>
                <option>Pottuvil</option>
                <option>Colombo</option>
                <option>Kandy</option>
                <option>Galle</option>
                <option>Jaffna</option>
                <option>Anuradhapura</option>
                <option>Polonnaruwa</option>
                <option>Trincomalee</option>
                <option>Batticaloa</option>
                <option>Negombo</option>
                <option>Kurunegala</option>
                <option>Ratnapura</option>
                <option>Nuwara Eliya</option>
                <option>Matale</option>
                <option>Badulla</option>
                <option>Kalmunai</option>
                <option>Dambulla</option>
                <option>Moratuwa</option>
                <option>Kalutara</option>
                <option>Kegalle</option>
                <option>Matara</option>
                <option>Gampaha</option>
                <option>Puttalam</option>
                <option>Vavuniya</option>
                <option>Ampara</option>
                <option>Hambantota</option>
                <option>Sigiriya</option>
                <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>

            <!-- Vehicle -->
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Vehicle Type</label>
              <select name="Vehicle" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option>Select Vehicle</option>
                <option>Car (3 Adults)</option>
                <option>SUV (3 Adults)</option>
                <option>Flat Roof Van (4-6 Adults)</option>
                <option>High Roof Van (7-9 Adults)</option>
                <option>Bus / Coach (15 / 25 / 45 Seater)</option>
                <option>Luxury (3-4 Adults)</option>
              </select>
            </div>

            <!-- Start Date -->
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Start Date</label>
              <input type="date" name="StartDate" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- End Date -->
            <div>
              <label class="block text-gray-600 mb-2 font-medium">End Date</label>
              <input type="date" name="EndDate" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Number of People -->
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Number of People</label>
              <input type="number" name="People" min="1" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Notes -->
            <div class="md:col-span-2 lg:col-span-3">
              <label class="block text-gray-600 mb-2 font-medium">Itinerary / Notes</label>
              <textarea name="Notes" rows="4" placeholder="Type your tour plan, special requests, or notes here..." class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
            </div>

            <!-- Submit -->
            <div class="md:col-span-2 lg:col-span-3 flex justify-center mt-4">
              <button type="submit" class="bg-green-600 text-white px-10 py-3 rounded-full text-lg font-medium hover:bg-green-700 transition shadow-md">Send Request</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer')

  <script>
  // Show/hide form
  document.getElementById("show-tour-form-btn").addEventListener("click", function() {
    const form = document.getElementById("tours-form");
    form.classList.toggle("hidden");
    window.scrollTo({ top: form.offsetTop - 50, behavior: 'smooth' });
  });

  // Send to WhatsApp
  document.getElementById("tourRequestForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const form = e.target;

    // Start message with only one greeting
    let message = "Hello! 😊\nI would like to request a tour:\n";

    Array.from(form.elements).forEach(el => {
        if(el.name && el.value) {
            message += `${el.name}: ${el.value}\n`;
        }
    });

    const phoneNumber = "+94770167206"; // Your WhatsApp number
    const encodedMessage = encodeURIComponent(message);
    const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

    window.open(whatsappURL, "_blank");
});

</script>

</body>
</html>
