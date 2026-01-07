@extends('layouts.app')

@section('title', 'Community')  <!-- Set the title for this page -->

@section('content')

<!-- Hero Content Section -->
<x-standard-hero 
    label="De kracht van Ons"
    title="Community" 
    subtitle="Je hoort erbij. Houd je focus en kracht vast."
    background="bg-v-backdrop-5 lg:bg-h-backdrop-2"
/>

@include('layouts.onze-waarden')

@include('layouts.socials-section')

@endsection