<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Traviaro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">

<!-- Full screen gradient background with blobs -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 relative overflow-hidden">

    <!-- Subtle background blobs -->
    <div class="absolute w-72 h-72 bg-indigo-200/40 rounded-full blur-3xl top-10 left-10"></div>
    <div class="absolute w-96 h-96 bg-teal-200/40 rounded-full blur-3xl bottom-10 right-10"></div>

    <!-- Login Card -->
    <div class="relative bg-white/70 backdrop-blur-lg border border-gray-300/50 rounded-2xl shadow-xl p-10 w-[90%] max-w-md text-gray-800">

        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Admin Logo" class="mx-auto w-24 h-24 rounded-full shadow-md mb-4 border border-gray-300">
            <h1 class="text-3xl font-bold tracking-wide text-gray-800">Admin Login</h1>
            <p class="text-gray-600 mt-1 text-sm">Access your Traviaro dashboard securely</p>
        </div>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" />

        <!-- Status Message -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <x-label for="email" value="{{ __('Email Address') }}" class="text-gray-700 font-semibold" />
                <x-input id="email" class="block mt-2 w-full px-4 py-2 rounded-lg bg-gray-100 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:outline-none border border-gray-300" 
                         type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="admin@example.com" />
            </div>

            <!-- Password -->
            <div>
                <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-semibold" />
                <x-input id="password" class="block mt-2 w-full px-4 py-2 rounded-lg bg-gray-100 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:outline-none border border-gray-300" 
                         type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between text-sm text-gray-600">
                <label class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="mr-2 border-gray-400 focus:ring-0 text-indigo-500" />
                    {{ __('Remember me') }}
                </label>

                @if (Route::has('password.request'))
                    <a class="hover:text-indigo-600 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="w-full py-3 bg-indigo-500 hover:bg-indigo-600 text-white transition-all duration-300 rounded-xl font-semibold tracking-wide shadow-md">
                    {{ __('Sign In') }}
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="mt-8 text-center text-gray-500 text-sm">
            <p>© {{ date('Y') }} Traviaro Admin Panel</p>
        </div>
    </div>
</div>

</body>
</html>
