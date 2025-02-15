@extends('layouts.app')

@section('title', 'TITLE')  <!-- Set the title for this page --> {{-- todo: Set the title --}}
@section('content')

<!-- Hero Content Section -->
<div class="h-[calc(100vh-4rem)] bg-v-backdrop-8 lg:bg-h-backdrop-1 bg-cover relative m-0"> {{-- todo: Alter the background image --}}
    <div class="h-full flex flex-col">
        <div class="flex-1 flex items-center justify-center flex-col lg:flex-row mt-0 relative">

            <!-- Title Section -->
            <div class="bg-colorPrimary/60 flex flex-col justify-center items-center p-8 lg:p-20 h-auto w-[85vw] lg:w-auto">
                <h1 class="text-4xl lg:text-9xl text-white font-bold uppercase font-times">TITLE</h1> {{-- todo Set the title --}}
            </div>

        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


        <!-- First Section (6/6) --> {{-- todo: Set the correct numbers --}}
        <div class="h-auto lg:h-full col-span-6">
            <div class="bg-colorPrimary/60 text-sm lg:text-2xl flex flex-col justify-center items-center text-white p-8 lg:p-20 py-20 text-left lg:text-justify">
                <!-- Content goes here -->
                <div class="">
                    <h1 class="mb-8 px-4 lg:px-0 text-4xl font-bold uppercase font-times">TITLE</h1> {{-- todo: Set the title --}}
    
                    <p class="text-base lg:text-lg mb-6 px-4 lg:px-0"> {{-- todo: Remove mb-6 for last doby of text --}}
                        Body of text {{-- todo: Add custom text --}}
                    </p>
                </div>

            </div>
        </div>

        
    </div>
</div>

@endsection