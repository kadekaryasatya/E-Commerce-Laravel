@extends("template.admin")
@section('title', 'Discount')
@section('judul', 'Discount')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">DISCOUNT EDIT</h5>
                 <div class="pull-right">
                    <a href="{{  route('listdiscount') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> back
                    </a>
                </div>
              </div>
              <div class="card-body">
                  <form action="{{  url('admin/discount/editprocess/'.$discount->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="product_id">Product Name</label>
                        <select class="form-control" id="product_id" name="product_id">
                        @foreach ($product as $item)
                            <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Percentage Discount</label>
                        <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $discount->percentage) }}">
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label>Start Discount</label>
                        <input type="date" name="start" class="form-control @error('start') is-invalid @enderror" value="{{ old('start') }}">
                        @error('start')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label>End Discount</label>
                        <input type="date" name="end" class="form-control @error('end') is-invalid @enderror" value="{{ old('end') }}">
                        @error('end')
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
