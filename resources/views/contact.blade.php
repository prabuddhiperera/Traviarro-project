<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us | Trivarro</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-white to-[#f0f8ff]">
    @include('navigation-menu')

    <!-- Hero Banner -->
<section class="relative bg-cover bg-center h-[65vh]" 
  style="background-image: url('/img/contact.jpg');">
  <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white text-center px-6">
    <h1 class="text-5xl font-bold mb-3 tracking-wide">Contact Trivarro</h1>
    <p class="max-w-2xl text-lg leading-relaxed">
      We’d love to hear from you! Whether you’re planning your next adventure or have a question, reach out to us anytime.
    </p>
  </div>
</section>

    

  <section class="py-20">
    <!-- Contact Section -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 px-6">
      
      <!-- Contact Form -->
      <div class="bg-white rounded-2xl shadow-xl p-8 md:p-10 hover:shadow-2xl transition-shadow duration-300">
        <h3 class="text-2xl font-semibold text-[#006994] mb-6 text-center">Send Us a Message</h3>
        <form action="#" method="POST" class="space-y-5">
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Full Name</label>
            <input type="text" placeholder="Enter your name"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#006994] focus:outline-none">
          </div>
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Email</label>
            <input type="email" placeholder="Enter your email"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#006994] focus:outline-none">
          </div>
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Message</label>
            <textarea rows="5" placeholder="Write your message here..."
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#006994] focus:outline-none"></textarea>
          </div>
          <button type="submit"
            class="w-full bg-[#006994] hover:bg-[#00557a] text-white py-3 rounded-lg text-lg font-semibold transition-all duration-300">
            Send Message
          </button>
        </form>
      </div>

      <!-- Contact Info -->
<div class="bg-[#006994] text-white rounded-2xl shadow-xl p-8 md:p-10 flex flex-col justify-center">
  <h3 class="text-3xl font-bold mb-6 text-center">Contact Information</h3>

  <div class="space-y-5">
    <!-- WhatsApp -->
    <div class="flex items-center space-x-4">
      <i class="fa-brands fa-whatsapp text-2xl text-green-400"></i>
      <p class="text-lg">
        <span class="font-semibold">WhatsApp -</span>
        <a href="https://wa.me/94770167206" target="_blank"
          class="underline hover:text-yellow-300 transition-all duration-300">(077) 016 7206</a>
      </p>
    </div>

    <!-- Phone -->
    <div class="flex items-center space-x-4">
      <i class="fa-solid fa-phone text-2xl text-blue-300"></i>
      <p class="text-lg">
        <span class="font-semibold">Phone -</span> (077) 016 7206
      </p>
    </div>

    <!-- Email -->
    <div class="flex items-center space-x-4">
      <i class="fa-solid fa-envelope text-2xl text-yellow-300"></i>
      <p class="text-lg">
        <span class="font-semibold">Email -</span>
        <a href="mailto:trivarro.lk@gmail.com"
          class="underline hover:text-yellow-300 transition-all duration-300">trivarro.lk@gmail.com</a>
      </p>
    </div>

    <!-- Instagram -->
    <div class="flex items-center space-x-4">
      <i class="fa-brands fa-instagram text-2xl text-pink-400"></i>
      <p class="text-lg">
        <span class="font-semibold">Instagram -</span>
        <a href="https://www.instagram.com/trivarro?igsh=ZmU4OHp1ZWI5anhx" target="_blank"
          class="underline hover:text-yellow-300 transition-all duration-300">Trivarro</a>
      </p>
    </div>
    

    <!-- Facebook -->
    <div class="flex items-center space-x-4">
      <i class="fa-brands fa-facebook text-2xl text-blue-500"></i>
      <p class="text-lg">
        <span class="font-semibold">Facebook -</span>
        <a href="https://www.facebook.com/share/14VRWZaQoZc/" target="_blank"
          class="underline hover:text-yellow-300 transition-all duration-300">Trivarro</a>
      </p>
    </div>

    <!-- TikTok -->
    <div class="flex items-center space-x-4">
      <i class="fa-brands fa-tiktok text-2xl text-gray-300"></i>
      <p class="text-lg">
        <span class="font-semibold">TikTok -</span>
        <a href="https://www.tiktok.com/@trivarro.lk?_t=ZS-90tyZG623ap&_r=1" target="_blank"
          class="underline hover:text-yellow-300 transition-all duration-300">Trivarro</a>
      </p>
    </div>
  </div>
</div>
</section>

@include('layouts.footer')

</body>
</html>
