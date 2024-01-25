<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
  <!-- component -->
  <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1748&q=80')">
    <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8 w-[500px] h-[600px]">
      <div class="text-white">
        <div class="mb-8 flex flex-col items-center">
          <img class="w-14" src="{{ asset('build/assets/logoipsum-327.svg') }}" width="150" alt="" srcset="" />
          <h1 class="text-gray-300 text-2xl mt-4  "> Enregistrement </h1>
        </div>
        <form method="POST" action="{{ route('register') }}">
  
          @csrf
            {{-- name --}}
          <div class="text-lg mb-10">
            {{-- <x-input-label for="email" :value="__('Email')" class="text-xl text-white ml-4" /> --}}
            <input  class="rounded-xl w-full border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="text" id="email" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Entrer votre nom" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          {{-- email --}}
          <div class="text-lg mb-10">
            {{-- <x-input-label for="email" :value="__('Email')" class="text-xl text-white ml-4" /> --}}
            <input  class="rounded-xl w-full border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="email" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Entrer votre email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
  
          {{-- Password --}}
          <div class="mb-10 text-lg">
            <input class="rounded-xl w-full border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="password" name="password" id="password" required autocomplete="current-password" placeholder="Entrer votre mot de passe" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

          {{-- Password confirmation --}}
          <div class="mb-10 text-lg">
            <input class="rounded-xl w-full border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" placeholder="Confirmer mot de passe" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
         
  
          <div class="flex justify-center text-lg text-black mt-10 flex-col items-center">
            
            <button type="submit" class="rounded-3xl mb-6 bg-yellow-400 w-[150px] bg-opacity-50 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-yellow-600">Enregistrer</button>
            
            <a class="underline text-sm text-yellow-400 hover:text-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà un compte ?') }}
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  </x-guest-layout>