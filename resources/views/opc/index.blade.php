@extends('layouts.app')
@section('judul')
    {{ 'OPC' }}
@endsection
@section('content')
  <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Bordered Table -->
<div class="card">
  <div class="card-body mb-0 pb-0"><a href="{{ url()->previous() }}" class="btn btn-sm btn-danger mb-0">
    <i class="bx bx-arrow-back bx-xs"></i> back</a>
  </div>
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0 mt-0">Data OPC</h5>
    <a href="{{ url('opcs/add') }}" class="btn btn-sm btn-primary mb-0 float-end">
      <i class="bx bx-plus-circle bx-xs"></i>  Tambah</a>
  </div>
    <div class="card-body">
    <div class="table-responsive ">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No OPC</th>
            <th>No Produk</th>
            <th>Tipe Produk</th>
            <th>Kuantiti Order</th>
            <th>Delivery</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
              <td>{{ $item['no_opc'] }}</td>
              <td>{{ $item['sopr_product_determination']['product_determination']['no_pd'] }}</td>
              <td>{{ $item['sopr_product_determination']['product_determination']['type'] }}</td>
              <td>{{ number_format($item['sopr_product_determination']['qty_order'], 0, ',', ','); }} m</td>
              <td>{{ date('d/m/Y',strtotime($item['sopr_product_determination']['delivery_req'])) }}</td>
              <td>
                <a class="btn btn-sm btn-secondary" href="#">
                <i class="bx bx-show-alt bx-xs me-1"></i> lihat</a>
                <a class="btn btn-sm btn-warning" href="#">
                <i class="bx bx-edit-alt bx-xs me-1" type="solid"></i> Edit</a>
            </td>
            </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--/ Bordered Table -->
</div>
@endsection
