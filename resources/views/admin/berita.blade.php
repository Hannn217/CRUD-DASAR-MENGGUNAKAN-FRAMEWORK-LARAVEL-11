@extends('layouts.app')

@section('title', 'asdasdas')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">

                        </div>
                        <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                                data-target="#myModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->judul_berita }}</td>
                                    <td>{{ $item->isi_berita }}</td>
                                    <td class="text-center">
                                        <Button class="btn btn-info" data-toggle="modal"
                                            data-target="#editModal{{ $item->id }}">Edit</Button>
                                        {{-- modal untuk edit --}}
                                        <div id="editModal{{ $item->id }}" class="modal fade" tabindex="-1"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ route('berita.edit', $item->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="id">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Edit Data Berita</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="example-text-input"
                                                                    class="form-label"><strong>Judul</strong></label>
                                                                <input class="form-control" type="text"
                                                                    name="judul_berita" value="{{ $item->judul_berita }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="example-text-input"
                                                                    class="form-label"><strong>Isi Berita</strong></label>
                                                                <textarea name="isi_berita" class="form-control">{{ $item->isi_berita }}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="customFile"
                                                                    class="form-label"><strong>Thumbnail</strong></label>
                                                                <div class="mb-3 custom-file">

                                                                    <input type="file" class="custom-file-input"
                                                                        id="customFile" name="gambar">
                                                                    <label class="custom-file-label" for="customFile">Choose
                                                                        file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect"
                                                                data-dismiss="modal">Close</button>

                                                            <button type="submit"
                                                                class="btn btn-success waves-effect waves-light">Simpan
                                                                Data</button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        <Button class="btn btn-danger" data-toggle="modal"
                                            data-target="#hapusModal{{ $item->id }}">Hapus</Button>

                                        {{-- modal untuk hapus --}}
                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="hapusModal{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin ingin menghapus Data ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <form action="{{ route('berita.delete', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('berita.store') }}" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Tambah Data Berita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label"><strong>Judul Berita</strong></label>
                            <input class="form-control" type="text" id="input_nama_sekolah" name="judul_berita">
                        </div>
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label"><strong>Isi Berita</strong></label>
                            <textarea name="isi_berita" id="deskripsi" cols="30" rows="5" class="form-control"> </textarea>
                        </div>

                        <div class="form-group">
                            <label for="customFile"
                                class="form-label"><strong>Thumbnail</strong></label>
                            <div class="mb-3 custom-file">

                                <input type="file" class="custom-file-input"
                                    id="customFile" name="gambar">
                                <label class="custom-file-label" for="customFile">Choose
                                    file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-success waves-effect waves-light">Simpan Data</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
