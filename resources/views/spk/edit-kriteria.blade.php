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
        @slot('title') Edit kriteria @endslot
    @endcomponent
   


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <form action="{{ route('kriteria.update',$find->id) }}" method="POST">
    	@csrf


        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Kode kriteria :</label>
            <div class="col-md-10">
            <input class="form-control" type="text" name="kode_kriteria" value="{{$find->kode_kriteria}}" required value="{{ old('kode_kriteria')}}" id="example-text-input" placeholder="masukan kode kriteria">
            </div>
        </div>


            <div class="mb-3 row">
              <label for="example-text-input" class="col-md-2 col-form-label">Nama kriteria :</label>
              <div class="col-md-10">
              <input class="form-control" type="text" name="nama_kriteria" value="{{$find->nama_kriteria}}" id="example-text-input" placeholder="masukan nama kriteria">
              </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Jenis :</label>
            <div class="col-md-10">
                <select class="form-select" name="jenis" value="{{$find->jenis}}" id="jenis"  >
                    <optgroup label="Pilih Jenis" >
                    <option>Benefit</option>
                    <option>Cost</option>
                </select>
            </div> </div> 
            
            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">Bobot :</label>
                <div class="col-md-10">
                <input class="form-control" type="number" name="bobot" value="{{$find->bobot}}" required value="{{ old('bobot')}}" id="example-text-input" placeholder="nilai bobot">
                </div>
            </div>
                </div> </div>
             </div>
		      {{-- <div class="mb-3 row">
		       
		             <label for="example-text-input" class="col-md-2 col-form-label">Detail :</label>
		              <div class="col-md-10">
                     <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		            </div>
        
		    </div> --}}
		    
		   
	<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kriteria.list') }}"> Back</a>
		            <button type="submit" class="btn btn-primary">Update</button>
            </div>


    </form>
</div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
