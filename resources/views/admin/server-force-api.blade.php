@extends('layouts.app')

@section('title', 'Force API\'s Serverside')  <!-- Set the title for this page -->

@section('content')

@include('layouts.admin-testing-panel')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-8rem)] bg-v-backdrop-9 lg:bg-h-backdrop-4 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-4 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">API's</h1>
                <h2 class="text-xl lg:text-4xl text-white font-bold uppercase font-times text-balance text-center">Force API-calls Serverside</h2>

            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- API info section (3/6) -->
        <div class="min-h-[20rem] h-[20rem] lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 h-full flex flex-col justify-center items-center text-white text-sm lg:text-2xl text-left lg:text-justify overflow-hidden rounded-none">

                <div class="">
                    <div class="w-full h-full">
                        <div class="h-full flex flex-col justify-center items-center  p-8 lg:p-20 py-20">
                            <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">API Informatie</h1>
                            <p class="text-base lg:text-lg">TikTok volgers: {{ $tiktokFollowerCount }}</p>
                            <p class="text-base lg:text-lg">Discord leden: {{ $discordMemberCount }}</p>
                            <p class="text-base lg:text-lg">Facebook volgers: {{ $facebookFollowerCount }}</p>
                            <p class="text-base lg:text-lg">Instagram volgers: {{ $instagramFollowerCount }}</p>
                            <p class="text-base lg:text-lg">Totale volgers: {{ $totalFollowerCount }}</p>
                            <h2 class="mt-8 px-4 lg:px-0 text-2xl font-bold uppercase font-times">Discord Invite Link</h2>
                            <p class="text-base lg:text-lg text-center leading-snug">
                                <a href="{{ $discordInviteLink }}" class="text-colorPrimary hover:underline" target="_blank">
                                    {{ $discordInviteLink }}
                                </a>
                            </p>
                            {{-- <p class="text-base lg:text-lg text-center leading-snug">App Versie</p>
                            <p class="text-base lg:text-lg text-center leading-snug">
                                {{ $appVersion }}
                            </p> --}}

                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- token Section (6/6) -->
        <div class="h-auto lg:h-full col-span-3 flex">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Forceer ophalen nieuwe tokens</h1>
    
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


        <!-- followers Section (6/6) -->
        <div class="h-auto lg:h-full col-span-3">
            <div class="bg-colorPrimary/20 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Forceer ophalen nieuwe volgers</h1>

                    <div class="space-y-8 w-full max-w-md self-start">
                        <!-- TikTok -->
                        <form method="POST" action="{{ route('admin.update-followers') }}" class="mb-4">
                            @csrf
                            <button type="submit" class="w-full bg-black text-white rounded hover:ring hover:ring-colorPrimary py-3 px-6 hover:bg-gray-800 text-lg lg:text-xl">
                                TikTok Follower Count ophalen
                            </button>
                            @if(session('tiktok_status') && session('tiktok_output'))
                                <p class="mt-2 text-base">Status: {{ session('tiktok_status') }}</p>
                                <p class="mt-2 text-base">Output: <span class="text-green-500">{{ session('tiktok_output') }}</span></p>
                            @endif
                        </form>

                        <!-- Meta -->
                        <form method="POST" action="{{ route('admin.update-meta-followers') }}" class="mb-4">
                            @csrf
                            <button type="submit" class="w-full bg-black text-white rounded hover:ring hover:ring-colorPrimary py-3 px-6 hover:bg-gray-800 text-lg lg:text-xl">
                                Meta Follower Count ophalen
                            </button>
                            @if(session('meta_status') && session('meta_output'))
                                <p class="mt-2 text-base">Status: {{ session('meta_status') }}</p>
                                <p class="mt-2 text-base">Output: <span class="text-green-500">{{ session('meta_output') }}</span></p>
                            @endif
                        </form>

                        <!-- Discord -->
                        <form method="POST" action="{{ route('admin.update-discord-followers') }}">
                            @csrf
                            <button type="submit" class="w-full bg-black text-white rounded hover:ring hover:ring-colorPrimary py-3 px-6 hover:bg-gray-800 text-lg lg:text-xl">
                                Discord Follower Count ophalen
                            </button>
                            @if(session('discord_status') && session('discord_output'))
                                <p class="mt-2 text-base">Status: {{ session('discord_status') }}</p>
                                <p class="mt-2 text-base">Output: <span class="text-green-500">{{ session('discord_output') }}</span></p>
                            @endif
                        </form>
                    </div>
                </div>

            </div>
        </div>
        
        
    </div>
</div>

@endsection