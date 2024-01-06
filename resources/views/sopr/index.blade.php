@extends('layouts.app')
@section('judul')
    {{ 'Data SOPR' }}
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
      <h5 class="mb-0 mt-0">Data SOPR</h5>
      <a href="{{ url('soprs/add') }}" class="btn btn-sm btn-primary mb-0 float-end">
        <i class="bx bx-plus-circle bx-xs"></i>  Tambah</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>No SOPR</th>
              <th>Customer</th>
              <th>Order Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item['no_sopr'] }}</td>
                <td>{{ $item['customer'] }}</td>
                <td>{{ date('d/m/Y',strtotime($item['order_date'])) }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="{{ url('sopr-product-determinations/'.$item['id']); }}">
                    <i class="bx bx-show-alt bx-xs me-1"></i> lihat</a>
                    <a class="btn btn-sm btn-warning" href="javascript:void(0);">
                    <i class="bx bx-edit-alt bx-xs me-1" type="solid"></i> Edit</a>
                    </div>
                  </div>
                </td>
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
