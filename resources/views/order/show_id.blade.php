@extends('layouts.app')
@section('judul')
    {{ 'Data Customer Order' }}
@endsection
@section('content')
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
  <!-- Bordered Table -->
  <div class="card">
    <div class="card-body mb-0 pb-0"><a href="{{ url()->previous() }}" class="btn btn-sm btn-danger mb-0">
      <i class="bx bx-arrow-back bx-xs"></i> back</a>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    <div class="card d-flex align-items-center pb-0 justify-content-between">
      <h4 class="mb-0 mt-0"><b>Data Detail Order SOPR</b></h4>
    </div>
    @if(isset($kosong))
    <div class="card-header align-items-center">
        <h5 class=""><b>No SOPR : </b>{{ $data['no_sopr'] }}</h5>
        <h5 class=""><b>No PO : </b>{{ $data['no_po'] }}</h5>
        <h5 class=""><b>Customer : </b>{{ $data['customer'] }}</h5>
        <h5 class=" align-items-center justify-content-between"><b>Tanggal Pemesanan : </b>{{ $data['order_date'] }}</h5>
            <a href="{{ url('orders/add') }}" class="btn btn-sm btn-primary mb-0 float-end">
        <i class="bx bx-plus-circle bx-xs"></i>  Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>No SOPR</th>
                    <th>No Produk</th>
                    <th>Tipe Produk</th>
                    <th>Kuantiti Order</th>
                    <th>Delivery</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
          </table>
        </div>
      </div>
    @else
    <div class="card-header align-items-center">
        <h5 class=""><b>No SOPR : </b>{{ $data[0]['sopr']['no_sopr'] }}</h5>
        <h5 class=""><b>No PO : </b>{{ $data[0]['sopr']['no_po'] }}</h5>
        <h5 class=""><b>Customer : </b>{{ $data[0]['sopr']['customer'] }}</h5>
        <h5 class=" align-items-center justify-content-between"><b>Tanggal Pemesanan : </b>{{ $data[0]['sopr']['order_date'] }}</h5>
            <a href="{{ url('orders/add') }}" class="btn btn-sm btn-primary mb-0 float-end">
        <i class="bx bx-plus-circle bx-xs"></i>  Tambah</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                  <th>No</th>
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
    @endif
    
  </div>
  <!--/ Bordered Table -->
</div>
@endsection
