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
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
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
            <?php $i=1 ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td><a href="{{ url('order/'.$item['id']) }}">{{ $item['no_sopr'] }}</a></td>
                <td>{{ $item['customer'] }}</td>
                <td>{{ date('d/m/Y',strtotime($item['order_date'])) }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ url('soprs/edit/'.$item['id']) }}">
                    <i class="bx bx-edit-alt bx-xs me-1" type="solid"></i> Edit</a>
                    <!-- Button trigger modal -->
                    <button
                      type="button"
                      class="btn btn-sm btn-danger"
                      data-bs-toggle="modal"
                      data-bs-target="#modalCenter_{{ $item['id'] }}"
                    ><i class="bx bx-trash bx-xs me-1"></i>
                      Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalCenter_{{ $item['id'] }}" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Konfirmasi Hapus</h5>
                            <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">
                            Anda yakin ingin menghapus data SOPR {{ $item['no_sopr'] }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                              Batal
                            </button>
                            <form action="{{  url('soprs/'.$item['id']) }}" method="post">
                              @csrf
                              @method('delete')
                            <button type="submit" name="submit" class="btn btn-danger">
                              <i class="bx bx-trash bx-xs me-1"></i> Hapus
                            </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
              </tr>
              <?php $i++ ?>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Bordered Table -->
</div>
@endsection
