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

{{-- <!-- Main Content Section -->
<div class="bg-colorPrimary/20 h-auto m-0 py-24 flex justify-center items-center">
    <div class="responsive-width flex flex-col lg:grid grid-cols-1 lg:grid-cols-6 gap-10">


    </div>
</div> --}}

@endsection