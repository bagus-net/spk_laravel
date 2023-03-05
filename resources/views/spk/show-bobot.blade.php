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
        @slot('title') Show Bobot @endslot
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
                  <form action="{{ route('bobot.update',$find->id) }}" method="POST">
    	@csrf


        
        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Id Kriteria :</label>
            <div class="col-md-10">
            {{-- <input class="form-control" type="text" name="id_category_barang" value="" id="example-text-input" placeholder="Name"> --}}
              <select class="form-select" name="id_kriteria" 
              id="userSelectCountry" aria-label="Floating label select">


              @foreach ($res_kriteria as $item)
              @if ($find->id_kriteria==$item->id)
              <option value="{{$item->id}}" selected >{{$item->kriteria}}</option>
                  
              @else
              <option value="{{$item->id}}">{{$item->kriteria}}</option>
              @endif
              @endforeach

              </select>
          </div>
        </div>


        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Nilai bobot :</label>
            <div class="col-md-10">
            <input class="form-control" type="text" name="nilai_bobot" value="{{$find->nilai_bobot}}" id="example-text-input" placeholder="edit nilai bobot">
            </div>
        </div>

		      {{-- <div class="mb-3 row">
		       
		             <label for="example-text-input" class="col-md-2 col-form-label">Detail :</label>
		              <div class="col-md-10">
                     <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		            </div>
        
		    </div> --}}
		    
		   
	<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bobot.list') }}"> Back</a>
		           
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
