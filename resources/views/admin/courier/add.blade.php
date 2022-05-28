@extends("template.admin")
@section('title', 'Courier')
@section('judul', 'Courier')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">COURIER ADD</h5>
                 <div class="pull-right">
                    <a href="{{  route('listcourier') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> back
                    </a>
                </div>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ url('admin/courier') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nama Courier</label>
                        <input type="text" name="courier" class="form-control @error('courier') is-invalid @enderror" value="{{ old('courier') }}" autofocus>
                        @error('courier')
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
      </div>
@endsection
