@extends('user.layouts.master')
@section('title','Profile Page')
@section('content')
@include('user.profile')
@role('student')
@livewire('user.profile.partials.upgrade-to-teacher')
@endrole
@livewire('user.profile.partials.profile-information')
@livewire('user.profile.partials.update-password')
@livewire('user.profile.partials.delete-account')
@endsection