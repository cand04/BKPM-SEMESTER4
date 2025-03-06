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

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Menambahkan Pengalaman Kerja
                    </header>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('pengalaman_kerja.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nama" class="control-label col-lg-2">Nama Perusahaan</label>
                                <div class="col-lg-10">
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jabatan" class="control-label col-lg-2">Jabatan</label>
                                <div class="col-lg-10">
                                    <input type="text" id="jabatan" name="jabatan" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahun_masuk" class="control-label col-lg-2">Tahun Masuk</label>
                                <div class="col-lg-10">
                                    <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahun_keluar" class="control-label col-lg-2">Tahun Keluar</label>
                                <div class="col-lg-10">
                                    <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('pengalaman_kerja.index') }}">
                                        <button type="button" class="btn btn-default">Batal</button>
                                    </a>
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
