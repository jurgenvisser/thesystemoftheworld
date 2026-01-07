@extends('layouts.app')

@section('title', 'Homepage')  <!-- Set the title for this page -->

@section('content')

{{-- #Dump Session Data for API token retrieval debugging --}}
{{-- @php
    dd(session()->all());
@endphp --}}

@include('layouts.homepage-hero')

@include('layouts.social-proof')

@include('layouts.homepage-problem')

@include('layouts.coach-quinn')

@include('layouts.cta-klaar-om-te-beginnen')

{{-- @include('layouts.onze-waarden') --}}

{{-- @include('layouts.mentorship-program') --}}

@include('layouts.homepage-quote')      

@endsection