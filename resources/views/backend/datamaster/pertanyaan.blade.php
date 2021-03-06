@extends('backend.partialadmin.layout')
@push('js')
    <script>
        $('.datatable').on('click','.modalEdit',function(){
            var id = $(this).attr('data-id');
            var link_url = "{{ url('pertanyaan') }}/"+id;
            $.ajax({
                url: link_url+"/edit",
                type: "get",
                success: function(result){
                    console.log(result);
                    $('#formEdit').attr('action', link_url);
                    $('#editIDPertanyaan').val(result.id);
                    $('#editPertanyaan').val(result.description);
                }
            })
        });
    </script>
@endpush
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Pertanyaan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pertanyaan</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('status') }}
                    </div>
                @endif
                <section id="patients-list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title">Daftar Pertanyaan</span>
                                    {{-- <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a> --}}
                                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalAdd">Tambah</button>
                                </div>
                                    <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list datatable" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Pertanyaan</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pertanyaan as $pert)    
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pert->description }}</td>
                                                    <td><a href="#" class="modalEdit" data-toggle="modal" data-target="#modalEdit" data-id="{{ $pert->id }}"><i class="ft-edit text-success"></i></button>
                                                        {{-- <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a> --}}
                                                        <a href="{{ url('pertanyaan/'.$pert->id.'/destroy') }}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" ><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="modal fade" id="modalAdd">
            <div class="modal-dialog">
                <form action="{{ route('pertanyaan.store') }}"method="POST">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Tambah Pertanyaan</h4>
                    </div>
                    <div class="modal-body">
                        <textarea name="pertanyaan" class="form-control" placeholder="Isikan pertanyaan"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit">
        <div class="modal-dialog">
            <form id="formEdit" action="" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit Pertanyaan</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id_pertanyaan" id="editIDPertanyaan" />
                    <textarea name="pertanyaan" class="form-control" id="editPertanyaan"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
    <!-- END: Content-->


@endsection