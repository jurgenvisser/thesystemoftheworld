@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

<div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0 flex items-center justify-center">
    {{-- <div class="h-[calc(100vh-4rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0"> --}}
    <div class="bg-colorPrimary/20 p-8 lg:p-16 text-white w-[90vw] md:w-[60vw] lg:w-[40vw]">
        <h1 class="text-2xl lg:text-4xl font-bold uppercase font-times text-center mb-6">Admin Login</h1>
       
        
        <form action="/admin/dashboard" method="POST" class="flex flex-col gap-6">
            <!-- CSRF Token (Laravel only) -->
            @csrf

            <!-- Password Input -->
            <div class="flex flex-col">
                <label for="password" class="text-lg lg:text-xl font-medium mb-2">
                    @if(session('error'))
                        Enter Password - <span class="text-rose-600">{{ session('error') }}</span> <!-- Display error message if password is incorrect -->
                    @else
                        Enter Password
                    @endif
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="p-3 text-lg bg-white text-black focus:outline-none focus:ring-2 focus:ring-colorPrimary/70" 
                    required 
                />
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="bg-colorPrimary hover:bg-colorPrimary/80 transition-all text-lg font-bold uppercase py-3 px-6">
                Login
            </button>
        </form>
    </div>
</div>
@endsection