<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $tour->name }} | Traviaro</title>
  
  <!-- Only one Tailwind version -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.3/dist/tailwind.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-800">

@include('navigation-menu')

<!-- Hero / Tour Title with Banner Image -->
<section class="relative bg-cover bg-center h-[90vh]" 
         style="background-image: url('{{ $tour->banner_image ? asset($tour->banner_image) : asset('img/tours/tours-fam.jpg') }}');">
    <div class="absolute inset-0 bg-blue-900/40"></div>

    <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-4">
            {{ $tour->name }}
        </h1>
    </div>
</section>

<!-- Tour Itinerary -->
<section class="w-full px-6 py-16 space-y-16 text-center md:text-left">
  @foreach($tour->days as $day)
  <div class="bg-white shadow-lg rounded-3xl p-8 mx-auto hover:scale-105 transition-transform duration-300 flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
      <!-- Image Left -->
      <div class="w-full md:w-1/2 flex-shrink-0">
          <img src="{{ $day->image ? asset($day->image) : asset('img/tours/default.jpg') }}" 
               alt="{{ $day->title }}" 
               class="w-full h-64 md:h-80 object-cover rounded-2xl shadow-md">
      </div>

      <!-- Content Right -->
      <div class="w-full md:w-1/2 space-y-4">
          <h2 class="text-3xl font-bold text-blue-700 mb-2">{{ $day->day_number }} - {{ $day->title }}</h2>
          <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
              @foreach(explode('.', $day->description) as $sentence)
                  @if(trim($sentence))
                      <li>{{ trim($sentence) }}.</li>
                  @endif
              @endforeach
          </ul>
      </div>
  </div>
  @endforeach
</section>

<!-- Inclusions / Exclusions -->
<section class="w-full bg-gradient-to-r from-white via-gray-50 to-white p-12 text-center space-y-10 shadow-inner">
  <div class="max-w-4xl mx-auto space-y-6">
    <h2 class="text-3xl font-bold text-blue-700 mb-4">Inclusions</h2>
    <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
      <li>Accommodation (If requested)</li>
      <li>Transportation in an air-conditioned vehicle with an English speaking driver</li>
      <li>Entrance Tickets, Government Taxes, Toll Fees</li>
      <li>Transportation Fuel</li>
      <li>Driver Meals and Accommodation</li>
    </ul>

    <h2 class="text-3xl font-bold text-blue-700 mt-8 mb-4">Exclusions</h2>
    <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
      <li>Alcoholic Beverages</li>
      <li>Extra meals/snacks and beverages ordered from the hotel or outside the hotel</li>
      <li>Early check-ins and late check-outs</li>
      <li>Tips & Expenses of personal nature</li>
      <li>Travel Insurance, Visa & Air Fare</li>
    </ul>
  </div>
</section>

<!-- Payment Policies -->
<section class="w-full bg-blue-50 p-12 text-center space-y-6">
  <h2 class="text-3xl font-bold text-blue-700 mb-4">Payment Policies & Methods</h2>

  <div class="max-w-4xl mx-auto text-left space-y-6">

      <p class="text-gray-700 text-lg">
        We accept payments made by bank transfer and cash payments. The currency of LKR is accepted by cash.
      </p>

      <p class="text-gray-700 text-lg">
        50% of the payment is required on confirmation. Balance can be paid upon arrival or full payment on confirmation.
      </p>

      <p class="text-gray-700 text-lg">
        Tip : If you need your cash currency to be converted to LKR, you can exchange your currency in the airport or you can inform the driver partner and he will take you to a place you can exchange such as banks or jewelery shops.
      </p>

      <h2 class="text-3xl font-bold text-blue-700 mt-10">Amendment and Cancellation Policy</h2>

      <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
          <li>Cancellation informed <strong>2 days prior to arrival</strong>, will be eligible with <strong>full refund</strong>.</li>
          <li>Cancellation informed <strong>the day prior to arrival</strong>, will be charged with <strong>50% cancellation</strong>.</li>
          <li>Cancellation informed <strong>on the day of arrival</strong>, will be charged with <strong>full cancellation</strong>.</li>
      </ul>

  </div>
</section>

<!-- FAQs -->
<section class="w-full bg-white p-12 text-center space-y-8 shadow-lg">
  <h2 class="text-3xl font-bold text-blue-700 mb-6">Everything You Need to Know</h2>
  <div class="max-w-3xl mx-auto space-y-4 text-left">
    @foreach([
        "Can I request a personalized tour plan?" => "Absolutely! Our experienced travel consultants will be delighted to design a custom-made itinerary tailored to your unique interests, preferences, and requirements.",
        "What kind of accommodation will be provided?" => "We partner with a wide selection of hotels offering various price ranges, comfort levels, and styles. Our team recommends the most suitable accommodation options.",
        "Can I extend the number of days?" => "We’ll be happy to adjust and customize your itinerary to include additional days, experiences, or destinations.",
        "Are the itineraries flexible and customizable?" => "All our itineraries are fully flexible and customizable. Our team adjusts routes, activities, accommodations, and durations to match your preferences."
    ] as $question => $answer)
    <div class="border rounded-2xl shadow-sm">
      <button class="w-full flex justify-between items-center p-4 text-lg font-semibold text-gray-800 focus:outline-none faq-btn">
        {{ $question }}
        <i class='bx bx-chevron-down text-2xl'></i>
      </button>
      <div class="faq-content px-4 pb-4 hidden text-gray-700">
        {{ $answer }}
      </div>
    </div>
    @endforeach
  </div>
</section>

<script>
document.querySelectorAll(".faq-btn").forEach(button => {
    button.addEventListener("click", () => {
        const content = button.nextElementSibling;
        const icon = button.querySelector("i");
        content.classList.toggle("hidden");
        icon.classList.toggle("rotate-180");
    });
});
</script>

@include('layouts.footer')
</body>
</html>
