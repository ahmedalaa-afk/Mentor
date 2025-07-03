@extends('super-admin.layouts.master')
@section('title','Profile Page')
@section('content')
@include('user.profile')
@livewire('super-admin.profile.partials.profile-information')
@livewire('super-admin.profile.partials.update-password')
@livewire('super-admin.profile.partials.delete-account')
@endsection