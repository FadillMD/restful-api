@extends('layouts.app')
@section('judul')
    {{ 'Tambah Order SOPR' }}
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
            <h5 class="mb-0">Tambahkan Order SOPR</h5>
            <small class="text-muted float-end">Mohon teliti dalam memasukan data</small>
          </div>
          <div class="card-body">
            <form action="{{  url('orders/add') }}" method="POST">
                @csrf
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">No Order</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-detail"></i></i
                    ></span>
                    <input
                      type="text"
                      class="form-control"
                      id="basic-icon-default-fullname"
                      placeholder="FC2001.0123"
                      aria-label="John Doe"
                      aria-describedby="basic-icon-default-fullname2"
                      name="code_number"
                      value="{{ old('code_number') }}"
                    />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">No SOPR</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text">
                        <i class="bx bx-buildings"></i></span>
                        <select class="form-control" name="id_sopr" id="exampleFormControlSelect1">
                          <option selected>Pilih SOPR</option>
                          @foreach ($data as $item)
                            <option value="{{ $item['id'] }}">{{ $item['no_sopr'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">No Product</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text">
                        <i class="bx bx-buildings"></i></span>
                        <select class="form-control" name="id_product_determination" id="exampleFormControlSelect1">
                          <option selected>Pilih PD Type</option>
                          @foreach ($data1 as $item)
                            <option value="{{ $item['id'] }}">{{ $item['no_pd'] }} | {{ $item['type'] }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kuantiti Order</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"
                      ><i class="bx bx-buildings"></i
                    ></span>
                    <input
                      type="text"
                      id="basic-icon-default-company"
                      class="form-control"
                      placeholder="10000"
                      name="qty_order"
                      value="{{ old('qty_order') }}"
                    />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tanggal Pengiriman</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input class="form-control" name="delivery_req" type="date" value="{{ old('delivery_req') }}" id="html5-date-input" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Notes</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-detail"></i></i
                    ></span>
                    <input
                      type="text"
                      class="form-control"
                      id="basic-icon-default-fullname"
                      placeholder="keterangan"
                      aria-label="John Doe"
                      aria-describedby="basic-icon-default-fullname2"
                      name="notes"
                      value="{{ old('notes') }}"
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