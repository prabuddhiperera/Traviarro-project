<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Traviaro Footer</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a2e0e6ad58.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">

  <!-- FOOTER -->
  <footer class="bg-[#006994] text-white font-sans">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">

      <!-- About -->
      <div>
        <!-- Logo and Name -->
        <div class="flex items-center space-x-3">
          <img 
            src="{{ asset('img/logo.jpeg') }}" 
            alt="Traviaro Logo" 
            class="w-12 h-12 md:w-14 md:h-14 object-contain mix-blend-lighten opacity-90"
          />
          <h2 class="text-3xl font-bold font-['Libre_Baskerville',serif] text-white">Trivarro</h2>
        </div>

        <!-- Description -->
        <p class="mt-4 text-gray-200 leading-relaxed max-w-md">
          Explore the world with Trivarro — where every journey becomes a story worth telling.
        </p>

        <!-- Social Links -->
        <div class="flex space-x-4 mt-5 text-2xl">
          <a href="https://www.facebook.com/share/14VRWZaQoZc/" class="hover:text-yellow-300 transition"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/trivarro?igsh=ZmU4OHp1ZWI5anhx" class="hover:text-yellow-300 transition"><i class="fab fa-instagram"></i></a>
          <a href="https://www.tiktok.com/@trivarro.lk?_t=ZS-90tyZG623ap&_r=1" class="hover:text-yellow-300 transition"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>


      <!-- Contact Info -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Contact Info</h3>
        <ul class="space-y-3 text-gray-200">
          <li><i class="fas fa-phone-alt text-yellow-300 mr-2"></i> Hotline: +94 77 016 7206</li>
          <li><i class="fas fa-envelope text-yellow-300 mr-2"></i> trivarro.lk@gmail.com</li>
          <li><i class="fas fa-map-marker-alt text-yellow-300 mr-2"></i> 280/8 Meda Ela Road, Nikaweratiya, Sri Lanka</li>
          <li><i class="fas fa-clock text-yellow-300 mr-2"></i> Open 24/7</li>
        </ul>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
        <ul class="space-y-2">
          <li><a href="/" class="hover:text-yellow-300 transition">Home</a></li>
          <li><a href="/about" class="hover:text-yellow-300 transition">About Us</a></li>
          <li><a href="/destinations" class="hover:text-yellow-300 transition">Destinations</a></li>
          <li><a href="/tours" class="hover:text-yellow-300 transition">Tours</a></li>
          <li><a href="/services" class="hover:text-yellow-300 transition">Our Services</a></li>
          <li><a href="/contact" class="hover:text-yellow-300 transition">Contact</a></li>
        </ul>
      </div>

      <!-- Payment & Registration -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Payment Methods</h3>
        <div class="flex items-center space-x-4 text-4xl">
          <i class="fab fa-cc-visa text-gray-200"></i>
          <i class="fab fa-cc-mastercard text-gray-200"></i>
          <i class="fab fa-cc-paypal text-gray-200"></i>
        </div>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-400 text-center py-5 text-sm text-gray-200">
      © <span id="year"></span> Traviaro. All Rights Reserved.
    </div>
  </footer>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>

</body>
</html>
