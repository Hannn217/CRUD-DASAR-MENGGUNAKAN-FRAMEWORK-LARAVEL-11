@extends('index')

@section('main')


<div class="row justify-content-center align-items-center mt-5">
@foreach ( $data as $item )
  <style>
    .image-container {
    position: relative;
    display: inline-block;
    margin-right: 55px;
}

.image-buttons {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-container:hover .image-buttons {
    opacity: 1;
}
  </style>

<div class="image-container">
  <img src="{{ asset('storage/images/' . $item->lokasi_file) }}" data-toggle="modal" data-target="#instagramModal{{ $item->id }}" width="250px" height="200x">
  <div class="image-buttons">
      <form action="/like-foto" method="post">
          @csrf
          <input type="hidden" name="c_url" value="public">
          <input type="hidden" name="foto_id" value="{{ $item->id }}">
        @if(Auth::check())
            @if(\App\Models\LikeFoto::where('user_id', Auth::user()->id)->where('foto_id', $item->id)->exists())
          <button class="btn btn-outline-secondary btn-sm" type="submit">
              <i class="fas fa-heart"></i> Unlike
          </button>
            @else
          <button class="btn btn-outline-secondary btn-sm" type="submit">
              <i class="fas fa-heart"></i> Like
          </button>
            @endif

        @else
        <button class="btn btn-outline-secondary btn-sm" type="submit">
            <i class="fas fa-heart"></i> Like
        </button>
        @endif
   

      </form>
      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#instagramModal{{ $item->id }}">
          <i class="fas fa-comment"></i> Comment
      </button>
  </div>
</div>

<div class="modal fade" id="instagramModal{{ $item->id }}" tabindex="-1" aria-labelledby="instagramModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8 d-flex justify-content-center align-items-center">
              <img src="{{ asset('storage/images/' . $item->lokasi_file) }}" class="img-fluid" style="min-width: 300px; min-height: 300px;" alt="Instagram Image">
            </div>
            <div class="col-md-4">
              <h2>Di Post Oleh : {{ $item->user->username }}</h2>
              <span class="badge badge-dark">{{ $item->tanggal_unggah }}</span>
              Like :  <span class="badge badge-pill badge-danger">{{ App\Models\LikeFoto::where('foto_id',$item->id)->count() }}</span>
              <ul class="list-group">
                @foreach ($item->komentar as $komentar )
                <span>{{ $komentar->user->username }}</span><li class="list-group-item">{{ $komentar->isi_komentar }}</li>
                @endforeach
              </ul>
              <form action="/komentar" method="post">
                @csrf
                <input type="hidden" name="c_url" value="public">
                <input type="hidden" name="foto_id" value="{{ $item->id }}">
                <div class="input-group mt-3">
                  <input type="text" class="form-control" placeholder="Add a comment" name="isi_komentar">
                  <button class="btn btn-primary btn-sm ml-2" type="submit">
                    <i class="fas fa-paper-plane"></i> Send
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection