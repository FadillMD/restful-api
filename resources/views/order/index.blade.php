@extends('layouts.app')
@section('judul')
    {{ 'Detail Order SOPR' }}
@endsection
@section('content')
  <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Bordered Table -->
<div class="card">
  <div class="card-body mb-0 pb-0"><a href="{{ url()->previous() }}" class="btn btn-sm btn-danger mb-0">
    <i class="bx bx-arrow-back bx-xs"></i> back</a>
  </div>

    <div class="card-header mb-0 pb-0">
      <h5 class="mb-2 mt-2">No SOPR  : {{ $data[0]['sopr']['no_sopr'] }} </h5>
      <h5 class="mb-2 mt-2">Customer : {{ $data[0]['sopr']['customer'] }}</h5>
      <h5 class="mb-4 mt-2 d-flex align-items-center justify-content-between">Tanggal Order : {{ $data[0]['sopr']['order_date'] }}
      <a href="{{ url('soprs/add') }}" class="btn btn-sm btn-primary mb-0 float-end">
        <i class="bx bx-plus-circle bx-xs"></i>  Tambah</a></h5>
    </div>
    <div class="table-responsive ">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>No PO</th>
            <th>No Produk</th>
            <th>Tipe Produk</th>
            <th>Kuantiti Order</th>
            <th>Delivery</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1;?>
          @foreach ($data as $item)
          <tr>
              <td>{{ $i }}</td>
              <td>{{ $item['code_number'] }}</td>
              <td>{{ $item['product_determination']['no_pd'] }}</td>
              <td>{{ $item['product_determination']['type'] }}</td>
              <td>{{ $item['qty_order'] }}</td>
              <td>{{ date('d/m/Y',strtotime($item['delivery_req'])) }}</td>
              
            </tr>
            <?php $i++;?>
          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--/ Bordered Table -->
</div>
@endsection
