@extends("template.admin")
@section('title', 'Admin ')
@section('judul', 'Admin ')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">ADMIN EDIT</h5>
                 <div class="pull-right">
                    <a href="{{  route('listadmin') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> back
                    </a>
                </div>
              </div>
              <div class="card-body">
                  <form action="{{  url('admin/editproses/'.$admin->id) }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $admin->username) }}" autofocus-required>
                                         @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $admin->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="integer" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $admin->phone) }}" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="profile">Profile Image</label>
                                        <input type="file" name="profile" id="profile" class="form-control @error('profile') is-invalid @enderror" value="{{ old('profile') }}">
                                        @error('profile')
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

