@extends('teacher.layouts.master')
@section('title','Profile Page')
@section('content')
@include('user.profile')
@livewire('teacher.profile.partials.profile-information')
@livewire('teacher.profile.partials.update-password')
@livewire('teacher.profile.partials.delete-account')
@endsection