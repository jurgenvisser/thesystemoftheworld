@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0 flex items-center justify-center">
    {{-- <div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0"> --}}
    <div class="bg-colorPrimary/20 p-8 lg:p-16 text-white w-[90vw] md:w-[60vw] lg:w-[40vw]">
        <h1 class="text-2xl lg:text-4xl font-bold uppercase font-times text-center mb-6">Admin Login</h1>
       
       
        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
            @csrf

            <div class="flex flex-col">
                <label for="email" class="text-lg lg:text-xl font-medium mb-2">E-mailadres</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    autofocus 
                    class="p-3 text-lg bg-white text-black focus:outline-none focus:ring-2 focus:ring-colorPrimary/70"
                />
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-lg lg:text-xl font-medium mb-2">Wachtwoord</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="p-3 text-lg bg-white text-black focus:outline-none focus:ring-2 focus:ring-colorPrimary/70"
                />
            </div>

            <div class="text-sm text-right">
                <a href="{{ route('password.request') }}" class="text-white underline hover:text-gray-300">
                    Wachtwoord vergeten?
                </a>
            </div>

            @if ($errors->any())
                <div class="text-red-500 bg-white p-3 rounded text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <button 
                type="submit" 
                class="bg-colorPrimary hover:bg-colorPrimary/80 transition-all text-lg font-bold uppercase py-3 px-6">
                Inloggen
            </button>
        </form>
    </div>
</div>
@endsection