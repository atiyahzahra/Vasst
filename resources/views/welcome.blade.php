@extends('layouts.app')

@section('title', 'VASST')

@section('content')
    <div class="welcome-section text-center">
        <div class="overlay">
            <h1 class="welcome-title">Welcome to Vasst</h1>
            <p class="welcome-subtitle">Your personal virtual assistant, always ready to help.</p>
            <a href="{{ route('login') }}" class="btn btn-lg btn-custom">Get Started</a>
        </div>
    </div>
@endsection

<style>
    .welcome-section {
        position: relative;
        height: 100vh;
        color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        box-sizing: border-box;
    }

    .overlay {
        background: rgba(34, 49, 63, 0.85);
        padding: 40px;
        border-radius: 15px;
        width: 80%;
        max-width: 600px;
        text-align: center;
    }

    .welcome-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 20px;
    }

    .welcome-subtitle {
        font-size: 1.25rem;
        color: #d0d0d0;
        margin-bottom: 30px;
    }

    .btn-custom {
        background-color: #4e54c8; /* Matching login page color */
        color: #ffffff;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #3a40a8; /* Slightly darker shade for hover */
        transform: translateY(-3px);
    }
</style>
