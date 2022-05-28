@extends("template.admin")
@section('title', 'Admin')
@section('judul', 'Admin')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">ADMIN ADD</h5>
                 <div class="pull-right">
                    <a href="{{  route('listadmin') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> back
                    </a>
                </div>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ url('admin/admin') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" autofocus>
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                        @error('phone')
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
