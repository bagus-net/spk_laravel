
@extends('layouts.master')
@section('title')
    @lang('translation.Datatables')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Tables @endslot
        @slot('title') List Komputer @endslot
    @endcomponent

 <div class="row">
        <div class="col-lg-12 margin-tb">
             <div class="card">
                <div class="card-body">
                {{-- @can('product-create') --}}
                <a class="btn btn-success" href="{{ route('komputer.create') }}"> Add Komputer</a>
                {{-- @endcan --}}
                
                 </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                 <th>No.</th>
                                 <th>Merk Komputer</th>
                                 <th>Type Komputer</th>
                                 <th>Harga</th>
                                 <th>Stok</th>
                                 <th>Action</th>

                              
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($res_komputer as $item)
                        <tr>
                           
                            
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->merk_komputer}}</td>
                            <td>{{ $item->type_komputer}}</td>
                            <td>{{ $item->harga_komputer}}</td>
                            <td>{{ $item->stok}}</td>


                        

                            <td>
                                <form action="{{ route('komputer.destroy',$item->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('komputer.show',$item->id) }}">Show</a>
                                    {{-- @can('product-edit') --}}
                                    <a class="btn btn-primary" href="{{ route('komputer.edit',$item->id) }}">Edit</a>
                                    {{-- @endcan --}}
                                    <a class="btn btn-danger" href="{{ route('komputer.destroy',$item->id) }}">Delete</a>

                                    @csrf
                                   
                                   
 
                                    {{-- @endcan --}}
                                </form>
                            </td>

                           
                        </tr>
	    @endforeach
                           
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
