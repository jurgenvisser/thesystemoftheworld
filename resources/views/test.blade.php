@extends('layouts.app')

@section('title', 'Test')  <!-- Set the title for this page -->
@section('content')

@include('layouts.admin-testing-panel') {{-- !! This line needs to be removed if the page goes into the production environment --}}

{{-- <!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0">
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">Test</h1>
            </div>

        </div>
    </div>
</div> --}}

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 pt-12 lg:pt-24 pb-12 lg:pb-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">

        <!-- Discord iframe (3/6) -->
        <div class="min-h-[20rem] h-[20rem] lg:h-full col-span-3">
            <div class="bg-colorPrimary/60 h-full flex flex-col justify-center items-center text-white text-sm lg:text-2xl text-left lg:text-justify overflow-hidden rounded-none">

                <div class="">
                    <div class="w-full h-full">
                        <div class="h-full flex flex-col justify-center items-center  p-8 lg:p-20 py-20">
                            <p class="text-base lg:text-lg text-center leading-snug">Discord Widget Info</p>

                            @if ($discordWidget)
                                <p>Server naam: {{ $discordWidget['name'] }}</p>
                                <p>Aantal online leden: {{ $discordWidget['presence_count'] }}</p>
                                <p><a href="{{ $discordWidget['instant_invite'] }}" target="_blank">Join Link</a></p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Discord iframe (3/6) -->
        <div class="min-h-[20rem] h-[20rem] lg:h-full col-span-3">
            <div class="bg-colorPrimary/60 h-full flex flex-col justify-center items-center text-white text-sm lg:text-2xl text-left lg:text-justify overflow-hidden rounded-none">

                <div class="">
                    <div class="w-full h-full">
                        <div class="h-full flex flex-col justify-center items-center  p-8 lg:p-20 py-20">
                            <p class="text-base lg:text-lg text-center leading-snug">Discord Guild Info</p>
                            @if ($discordGuild)
                                <p>Discord leden: {{ $discordMembersCount }}</p>
                                <p>Online: {{ $discordGuild['approximate_presence_count'] }}</p>
                            @endif
                                
                            <p class="text-base lg:text-lg text-center leading-snug">TikTok Data</p>
                            @if(isset($tiktokData['user']['follower_count']))
                                <p>TikTok volgers: {{ $tiktokData['user']['follower_count'] }}</p>
                                {{-- <pre>{{ json_encode($tiktokData, JSON_PRETTY_PRINT) }}</pre> --}}
                                <p>Totale volgers: {{ ($tiktokData['user']['follower_count'] ?? 0) + ($discordMembersCount ?? 0) }}</p>
                            @else
                                {{ json_encode($tiktokDebugHeaders, JSON_PRETTY_PRINT) }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- <!-- First Section (6/6) -->
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">Test</h1>
    
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0">
                        Body of text
                    </p>
                </div>

            </div>
        </div> --}}

        
    </div>
</div>

@endsection