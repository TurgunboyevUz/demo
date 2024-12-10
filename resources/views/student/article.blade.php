@extends('layouts::student.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Maqola yuklash</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Maqola yuklash formasi -->
        <div class="card card-primary mb-4">
            <div class="card-header">
                <h3 class="card-title">Ilmiy nashr qo'shish</h3>
            </div>
            <form action="{{ route('student.article') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="full_name"><i class="fas fa-user"></i> Talaba FIO</label>

                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $user->fio() }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="ilmiy_ish_nomi"><i class="fas fa-book"></i> Ilmiy ish nomi</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="keywords"><i class="fas fa-key"></i> Kalit so'zlar</label>
                                <input type="text" class="form-control" id="keywords" name="keywords">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="nashr_turi"><i class="fas fa-list-alt"></i> Ilmiy nashr turi</label>
                                <select id="nashr_turi" class="form-control" name="criteria_id" required>
                                    @foreach ($criterias as $criteria)
                                    <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="til"><i class="fas fa-language"></i> Til</label>
                                <select id="til" class="form-control" name="lang" required>
                                    <option value="uz">O'zbek tili</option>
                                    <option value="ru">Rus tili</option>
                                    <option value="en">Ingliz tili</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="muallif_soni"><i class="fas fa-users"></i> Mualliflar soni</label>
                                <input type="number" class="form-control" id="muallif_soni" name="authors_count" min="1" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label for="mualliflar"><i class="fas fa-user-friends"></i> Mualliflar</label>
                                <input type="text" class="form-control" id="mualliflar" name="authors" placeholder="Masalan: Samadov, Anvarov Oyatillo, Diyorbek Turg'unboyev">
                                <small class="form-text text-muted">Masalan: Samadov, Anvarov Oyatillo, Diyorbek
                                    Turg'unboyev</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="doi"><i class="fas fa-link"></i> DOI</label>
                                <input type="text" class="form-control" id="doi" name="doi">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="manba_nomi"><i class="fas fa-newspaper"></i> Manba (Jurnal) nomi</label>
                                <input type="text" class="form-control" id="manba_nomi" name="journal_name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="ilmiy_baza"><i class="fas fa-database"></i> Xalqaro ilmiy bazalar</label>
                                <input type="text" class="form-control" id="ilmiy_baza" name="international_databases">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nashr_yili"><i class="fas fa-calendar-alt"></i> Nashr yili</label>
                                <input type="number" class="form-control" id="nashr_yili" name="published_year" min="1900" max="2100">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nashr_parametrlari"><i class="fas fa-cog"></i> Nashr parametrlari</label>
                                <input type="text" class="form-control" id="nashr_parametrlari" name="publish_params">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="oquv_yili"><i class="fas fa-graduation-cap"></i> O'quv yili</label>
                                <input type="number" class="form-control" id="oquv_yili" name="education_year" min="2020" max="2100">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file"><i class="fas fa-file-upload"></i> Fayl yuklash</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Yuklash</button>
                </div>
            </form>
        </div>

        <!-- Yuklangan fayllar ro'yxati -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Yuklangan fayllar ro'yxati</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-responsive" style="">
                        <thead>
                            <tr>
                                <th>Talaba ism, familiyasi</th>
                                <th>Ilmiy ish nomi</th>
                                <th>Kalit so'zlar</th>
                                <th>Ilmiy nashr turi</th>
                                <th>Til</th>
                                <th>Mualliflar</th>
                                <th>DOI</th>
                                <th>Manba (Jurnal) nomi</th>
                                <th>Xalqaro ilmiy bazalar</th>
                                <th>Nashr yili</th>
                                <th>Nashr parametrlari</th>
                                <th>O'quv yili</th>
                                <th>Fayl nomi</th>
                                <th>Holati</th>
                                <th>Harakatlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $article)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->second_name }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->keywords }}</td>
                                <td>{{ $article->article_type }}</td>
                                <td>{{ $article->language }}</td>
                                <td>{{ $article->authors }}</td>
                                <td>{{ $article->doi }}</td>
                                <td>{{ $article->journal_name }}</td>
                                <td>{{ $article->international_database }}</td>
                                <td>{{ $article->publication_year }}</td>
                                <td>{{ $article->publication_parameters }}</td>
                                <td>{{ $article->academic_year }}</td>
                                <td>
                                    @foreach($article->files as $file)
                                    {{ $file->name }}
                                    @endforeach
                                </td>
                                <td><span class="badge badge-success" style="margin-left: -8px;">Tasdiqlandi</span></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" style="margin-left: -10px;"><i class="fas fa-trash"></i> O'chirish</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
