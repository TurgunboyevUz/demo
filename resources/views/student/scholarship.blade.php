@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Stipendiya Yutuqlari</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Yutuq ma'lumotlarini kiritish shakli -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Yutuq ma'lumotlarini kiritish</h3>
                </div>
                <form action="{{ route('student.scholarship') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Yutuq turi -->
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="awardType"><i class="fas fa-trophy"></i> Yutuq turi</label>
                                    <select class="form-control" id="awardType" name="criteria_id" required>
                                        <option selected disabled>Yutuq turini tanlang:</option>
                                        @foreach($criterias as $criteria)
                                            <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('criteria_id'))
                                        <span class="text-danger">{{ $errors->first('criteria_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Yutuq berilgan sana -->
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="awardDate"><i class="fas fa-calendar-alt"></i> Yutuq berilgan sana</label>
                                    <input type="date" class="form-control" id="awardDate" name="given_date" required>
                                    @if($errors->has('given_date'))
                                        <span class="text-danger">{{ $errors->first('given_date') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Guvohnoma raqami -->
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="certificateNumber"><i class="fas fa-id-card"></i> Guvohnoma raqami</label>
                                    <input type="text" class="form-control" id="certificateNumber" name="certificate_number" placeholder="Guvohnoma raqamini kiriting" required>
                                    @if($errors->has('certificate_number'))
                                        <span class="text-danger">{{ $errors->first('certificate_number') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Nomi -->
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="awardName"><i class="fas fa-file-alt"></i> Yutuq nomi</label>
                                    <input type="text" class="form-control" id="awardName" name="name" placeholder="Yutuq nomini kiriting" required>
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Fayl yuklash -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fileUpload"><i class="fas fa-upload"></i> Fayl yuklash</label>
                                    <input type="file" class="form-control-file" id="fileUpload" name="file" required>
                                    @if($errors->has('file'))
                                        <span class="text-danger">{{ $errors->first('file') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Saqlash</button>
                    </div>
                </form>
            </div>

            <!-- Jadval: Yuklangan Stipendiya Yutuqlari Ro'yxati -->
            <div class="card card-primary mt-4">
                <div class="card-header">
                    <h3 class="card-title">Yuklangan Stipendiya Yutuqlari Ro'yxati</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Yutuq turi</th>
                                    <th>Berilgan sana</th>
                                    <th>Guvohnoma raqami</th>
                                    <th>Nomi</th>
                                    <th>Fayl nomi</th>
                                    <th>Holati</th>
                                    <th>Harakatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->criteria->name }}</td>
                                    <td>{{ $item->given_date }}</td>
                                    <td>{{ $item->certificate_number }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->file->name }}</td>
                                    <td><span class="badge badge-success">Tasdiqlandi</span></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> O'chirish</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
