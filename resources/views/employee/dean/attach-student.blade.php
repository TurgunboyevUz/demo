@extends('layouts::employee.dean.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Topshiriq Yaratish</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Topshiriq yaratish</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yangi Topshiriq Yaratish</h3>
                </div>
                <div class="card-body">
                    <form id="assignmentForm" action="{{ route('employee.teacher.create-task') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="studentSelect">Talabani tanlang:</label>
                            <select name="student_id" id="studentSelect" class="form-control" required>
                                <option value="" disabled selected>Talabani tanlang</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->user->fio() }} ({{ $student->level }}-kurs {{ $student->specialty->name }})</option>
                                @endforeach
                            </select>
                            @if($errors->has('student_id'))
                                <span class="text-danger">{{ $errors->first('student_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="assignmentTitle">Topshiriq Nomi:</label>
                            <input name="title" type="text" id="assignmentTitle" class="form-control" placeholder="Topshiriq nomini kiriting" required>
                            @if($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="assignmentDescription">Topshiriq Ta'rifi:</label>
                            <textarea name="description" id="assignmentDescription" class="form-control" rows="4" placeholder="Topshiriq ta'rifini kiriting" required></textarea>
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="assignmentFile">Fayl yuklash:</label>
                            <input name="file" type="file" id="assignmentFile" class="form-control-file" required>
                            @if($errors->has('file'))
                                <span class="text-danger">{{ $errors->first('file') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-plus"></i> Yaratish</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
