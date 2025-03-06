@extends('backend.layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                    <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                </ol>
            </div>
        </div>

        <!-- Menampilkan pesan error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk menambahkan atau mengedit pengalaman kerja -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        @isset($pengalaman_kerja)
                            Mengedit Pengalaman Kerja
                        @else
                            Menambahkan Pengalaman Kerja
                        @endisset
                    </header>

                    <div class="panel-body">
                        <form class="form-validate form-horizontal" id="pengalaman_kerja_form" method="POST" 
                              action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store') }}">
                            @csrf
                            @isset($pengalaman_kerja)
                                @method('PUT')
                            @endisset

                            <div class="form-group">
                                <label for="nama" class="control-label col-lg-2">Nama Perusahaan <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="nama" name="nama" type="text" 
                                           value="{{ old('nama', isset($pengalaman_kerja) ? $pengalaman_kerja->nama : '') }}" 
                                           required minlength="3" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jabatan" class="control-label col-lg-2">Jabatan <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="jabatan" name="jabatan" type="text" 
                                           value="{{ old('jabatan', isset($pengalaman_kerja) ? $pengalaman_kerja->jabatan : '') }}" 
                                           required minlength="2" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahun_masuk" class="control-label col-lg-2">Tahun Masuk <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="tahun_masuk" name="tahun_masuk" type="text" 
                                           value="{{ old('tahun_masuk', isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_masuk : '') }}" 
                                           required minlength="4" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahun_keluar" class="control-label col-lg-2">Tahun Keluar <span class="required">*</span></label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="tahun_keluar" name="tahun_keluar" type="text" 
                                           value="{{ old('tahun_keluar', isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_keluar : '') }}" 
                                           required minlength="4" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-default">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection
