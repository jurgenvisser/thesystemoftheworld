@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<!-- Hero Content Section -->
{{-- <x-standard-hero 
    label="Connectie"
    title="Contact" 
    subtitle="Tijd is de meest waardevolle asset. Communiceer direct en efficiënt."
    background="bg-v-backdrop-7 lg:bg-h-backdrop-2"
/> --}}

@include('layouts.contact-and-form')

@include('layouts.socials-section')

@endsection