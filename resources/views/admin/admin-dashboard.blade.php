@extends('layouts.app')

@section('title', 'Admin Dashboard')  <!-- Set the title for this page -->

@section('content')

@include('layouts.admin-testing-panel')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-8rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Admin Dashboard</h1>
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- First Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-start items-start text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Forceer data ophalen bij server</h1>
    
                    <div class="space-y-8 w-full max-w-md self-start">
                        <form method="POST" action="{{ route('admin.refresh-tiktok-token') }}">
                            @csrf
                            <button type="submit" class="w-full bg-black text-white rounded hover:ring hover:ring-colorPrimary py-3 px-6 hover:bg-gray-800 text-lg lg:text-xl">
                                TikTok Access Token handmatig vernieuwen
                            </button>
                            @if(session('tiktok_access_token'))
                                <p class="text-green-500 mt-2 text-base break-all">Nieuwe access token: {{ session('tiktok_access_token') }}</p>
                            @endif
                        </form>

                        <form method="POST" action="{{ route('admin.refresh-meta-token') }}">
                            @csrf
                            <button type="submit" class="w-full bg-black text-white rounded hover:ring hover:ring-colorPrimary py-3 px-6 hover:bg-gray-800 text-lg lg:text-xl">
                                Meta Access Token handmatig vernieuwen
                            </button>
                            @if(session('meta_access_token'))
                                <p class="text-green-500 mt-2 text-base break-all">Nieuwe access token: {{ session('meta_access_token') }}</p>
                            @endif
                        </form>

                        {{-- <form method="POST" action="{{ route('admin.update-followers') }}">
                            @csrf
                            <button type="submit" class="w-full bg-black text-white rounded hover:ring hover:ring-colorPrimary py-3 px-6 hover:bg-gray-800 text-lg lg:text-xl">
                                TikTok Follower Count ophalen
                            </button>
                            @if(session('follower_count'))
                                <p class="text-green-500 mt-2 text-base">Nieuwe follower count: {{ session('follower_count') }}</p>
                            @endif
                        </form> --}} 
                        {{-- todo: nog even maken allemaal --}}
                    </div>

                    <div>
                        @if(session('facebook_token'))
                            <div class="text-green-500 mt-4">
                                Access Token ontvangen: {{ session('facebook_token') }}
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
        
        
    </div>
</div>

@endsection