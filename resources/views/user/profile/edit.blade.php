@extends('user.layouts.master')
@section('title','Profile Page')
@section('content')
@include('user.profile')
@livewire('user.profile.partials.profile-information')
@livewire('user.profile.partials.update-password')
@livewire('user.profile.partials.delete-account')
@endsection