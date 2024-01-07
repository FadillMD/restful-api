@extends('layouts.app')
@section('judul')
    {{ 'Perbaharui Data SOPR' }}
@endsection
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Basic with Icons -->
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body mb-0 pb-0"><a href="{{ url('soprs') }}" class="btn btn-sm btn-danger mb-0">
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
        <h5 class="mb-0">Perbaharui Data SOPR</h5>
        <small class="text-muted float-end">Mohon teliti dalam memasukan data</small>
      </div>
      <div class="card-body">
        <form action="{{  url('soprs/edit/'.$data['id']); }}" method="POST">
            @csrf
            @method('put')
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">No SOPR</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class="bx bx-detail"></i></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  id="basic-icon-default-fullname"
                  placeholder="008/MK/SOPR/I/23"
                  aria-label="John Doe"
                  aria-describedby="basic-icon-default-fullname2"
                  name="no_sopr"
                  value="{{ $data['no_sopr'] }}"
                />
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">No PO</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class="bx bx-detail"></i></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  id="basic-icon-default-fullname"
                  placeholder="P6851"
                  name="no_po"
                  value="{{ $data['no_po'] }}"
                />
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Customer</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"
                  ><i class="bx bx-buildings"></i
                ></span>
                <input
                  type="text"
                  id="basic-icon-default-company"
                  class="form-control"
                  placeholder="ACME Inc."
                  name="customer"
                  value="{{ $data['customer'] }}"
                />
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tanggal Order</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input class="form-control" name="order_date" type="date" value="{{ $data['order_date'] }}" id="html5-date-input" />
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" name="submit" class="btn btn-primary">Perbaharui</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection