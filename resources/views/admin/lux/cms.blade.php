@extends('admin.layouts.app')

@section('page', 'Lux QR CMS')

@section('content')
<section>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <p class="text-muted small mb-1">Collection 1 page link</p>
                            <p class="text-dark small">{!!$data->link1 ?? ''	!!}</p>
                         
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.terms.store',['id'=>$data->id]) }}" enctype="multipart/form-data">
                    @csrf
                        <h4 class="page__subtitle">Edit</h4>
                        <div class="form-group mb-3">
                            <label class="label-control">Terms and Condition <span class="text-danger">*</span> </label>
                            <textarea type="text" id="terms" name="terms" placeholder="" class="form-control">{{ $data->terms }}</textarea>
                            @error('terms') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-danger">Update</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
    <br>
    
</section>
@endsection
@section('script')
<script>
 ClassicEditor
        .create( document.querySelector( '#terms' ) )
        .catch( error => {
            console.error( error );
        });
	ClassicEditor
        .create( document.querySelector( '#failure_message' ) )
        .catch( error => {
            console.error( error );
        });
</script>
@endsection