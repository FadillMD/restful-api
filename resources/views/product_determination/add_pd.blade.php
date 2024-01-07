@extends('layouts.app')
@section('judul')
    {{ 'Tambah Data Product Determination' }}
@endsection
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Basic with Icons -->
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body mb-0 pb-0"><a href="{{ url('product-determinations') }}" class="btn btn-sm btn-danger mb-0">
        <i class="bx bx-arrow-back bx-xs"></i> back</a>
      </div>
      @if($errors->any())
      <div class="alert alert-danger mt-2" role="alert">
        <ul>
          @foreach ($errors->all() as $item)
          <li>{{ $item }}</li>              
          @endforeach
        </ul>
      </div>
      @endif
      <div class="card-header d-flex align-items-center justify-content-between mt-0">
        <h5 class="mb-0">Tambahkan Data Product Determination</h5>
        <small class="text-muted float-end">Mohon teliti dalam memasukan data</small>
      </div>
      <div class="card-body">
        <form action="{{  url('product-determinations/add') }}" method="POST">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">No Product</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class="bx bx-detail"></i></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  id="basic-icon-default-fullname"
                  placeholder="27202N01X1WH4"
                  name="no_pd"
                  value="{{ old('no_pd') }}"
                />
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Type</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class="bx bx-detail"></i></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  id="basic-icon-default-fullname"
                  placeholder="NYAF 1 mm2 450/750 V FIRST CABLE White-4"
                  name="type"
                  value="{{ old('type') }}"
                />
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Marking</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"
                  ><i class="bx bx-buildings"></i
                ></span>
                <input
                  type="text"
                  id="basic-icon-default-company"
                  class="form-control"
                  name="marking"
                  value="{{ old('marking') }}"
                />
              </div>
            </div>
          </div>
          
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection