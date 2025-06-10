@extends('admin.layouts.master')
@section('teacher-active', 'active')
@section('content')
    @livewire('admin.teacher.teachers-data')
    @livewire('admin.teacher.teachers-create')
    @livewire('admin.teacher.teachers-show')
    @livewire('admin.teacher.teachers-delete')
    @livewire('admin.teacher.teachers-edit')
@endsection