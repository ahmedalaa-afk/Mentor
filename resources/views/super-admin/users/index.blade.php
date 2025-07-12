@extends('super-admin.layouts.master')
@section('users-active', 'active')
@section('content')
<!-- Content -->
@livewire('super-admin.users.users-data')
@livewire('super-admin.users.users-edit')
<!-- / Content -->
@endsection