@extends('layouts.app')

@section('title', 'Mentorschap') <!-- Set the title for this page --> 

@section('content')

{{-- <x-standard-hero 
    label="Het Protocol"
    title="Mentorship" 
    subtitle="Mentaal onderhoud is geen keuze. Het is je maandelijkse overleving. Je onderhoudt je huis, waarom niet je hoofd?"
    background="bg-v-backdrop-8 lg:bg-h-backdrop-3"
/>

<!-- Main Content Section -->
@include('layouts.3-fasen-systeem')

@include('layouts.coach-quinn') --}}

@include('layouts.mentorship-program')

{{-- @include('layouts.glow-discord') --}}

@include('layouts.cta-klaar-om-te-beginnen')

@endsection