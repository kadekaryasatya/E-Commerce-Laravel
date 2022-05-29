@extends('template.admin')
@section('title', 'Product ')
@section('judul', 'Product')

@section('content')

<div class="content">
          <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="text-center">Proof Payment</h5>
              </div>
              <div class="card-body ">
                  <form method="POST" action="{{ url('user/proof/'.$transaction->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="proof">Proof Payment</label>
                        <input type="file" name="proof" id="proof" class="form-control @error('proof') is-invalid @enderror" value="{{ old('proof') }}">
                        @error('proof')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
@endsection
