@extends('super-admin.layouts.master')
@section('roles-active', 'active')
@section('content')
<!-- Content -->
@livewire('super-admin.roles.roles-data')
@livewire('super-admin.roles.roles-create')
@livewire('super-admin.roles.roles-edit')
@livewire('super-admin.roles.roles-delete')
<!-- / Content -->
@endsection