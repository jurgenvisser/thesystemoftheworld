@extends('layouts.app')

@section('content')
    <div class="p-8">
        <h1 class="text-2xl font-bold">Facebook Access Token</h1>
        @if($token)
            <p class="mt-4 bg-gray-100 p-4 break-all">{{ $token }}</p>
        @else
            <p class="mt-4 bg-red-100 text-red-600 p-4 break-all">Geen access token beschikbaar.</p>
        @endif
    </div>
@endsection

{{-- <script>
  if (window.location.hash && window.location.hash === '#_=_') {
    window.history.replaceState("", document.title, window.location.pathname + window.location.search);
  }
</script> --}}