@extends('layouts.app')
@section('judul')
    {{ 'Data Product Determination' }}
@endsection
@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Bordered Table -->
    <div class="card">
      <div class="card-body mb-0 pb-0"><a href="{{ url()->previous() }}" class="btn btn-sm btn-danger mb-0">
        <i class="bx bx-arrow-back bx-xs"></i> back</a></div>
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0 mt-0">Data Product Determination</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>No PD</th>
                <th>Type</th>
                <th>Marking</th>
                <th>Tanggal Update</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              @foreach ($data as $item)
              <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $item['no_pd'] }}</td>
                  <td>{{ $item['type'] }}</td>
                  <td>{{ $item['marking'] }}</td>
                  <td>{{ date('d/m/Y',strtotime($item['updated_at'])) }}</td>
                  <td>
                    <div class="dropdown">
                      <button
                        type="button"
                        class="btn p-0 dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown"
                      >
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('sopr-product-determinations/'.$item['id']); }}"
                          ><i class="bx bx-edit-alt me-1"></i> Show</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-trash me-1"></i> Edit</a
                        >
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