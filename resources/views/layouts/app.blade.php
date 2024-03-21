@extends('layouts.layout')

@section('content')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
@endsection
