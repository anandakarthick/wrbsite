@extends('layouts.app')

@section('title', 'KA Software - AI-Powered Software Development | Mobile Apps, Web Apps, AI Solutions')

@section('content')
    <!-- Hero Section -->
    @include('sections.hero')
    
    <!-- Services Section -->
    @include('sections.services')
    
    <!-- AI Features Section -->
    @include('sections.ai-features')
    
    <!-- Stats Section -->
    @include('sections.stats')
    
    <!-- Portfolio Section -->
    @include('sections.portfolio')
    
    <!-- Contact Section -->
    @include('sections.contact')
    
    <!-- CTA Section -->
    @include('sections.cta')
@endsection
