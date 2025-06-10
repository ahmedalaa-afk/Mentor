@extends('admin.layouts.master')
@section('category-active', 'active')
@section('content')
@livewire('admin.category.categories-data')
@livewire('admin.category.categories-create')
@livewire('admin.category.categories-edit')
@livewire('admin.category.categories-delete')
@endsection