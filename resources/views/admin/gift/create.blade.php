@extends('admin.layouts.app')
@section('page', 'Create new Gift')

@section('content')
<style>
    input::file-selector-button {
        display: none;
    }
</style>

<section>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.gift.store') }}" enctype="multipart/form-data">@csrf
						{{-- <a class="btn btn-sm btn-success actionTimebtn addNewTime">+</a> --}}
                        <div class="row mb-2">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control" id="start_date" name="start_date" placeholder="name@example.com" value="{{ old('start_date') }}">
                                        <label for="start_date">Validity from *</label>
                                    </div>
                                    @error('start_date') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control" id="end_date" name="end_date" placeholder="name@example.com" value="{{ old('end_date') }}">
                                        <label for="end_date">Validity to *</label>
                                    </div>
                                    @error('end_date') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                        </div>
						 {{-- <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
										
                                        <input type="text" class="form-control" id="title" name="multiple_user_count" placeholder="name@example.com" value="{{ old('multiple_user_count') }}">
										<p class="text-danger">multiple user count</p>
                                        <label for="title">User count *</label>
                                    </div>
                                    @error('multiple_user_count') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div> --}}
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
										
                                        <input type="text" class="form-control" id="title" name="user_count" placeholder="name@example.com" value="{{ old('user_count') }}">
                                        <label for="title">User count *</label>
                                    </div>
                                    @error('title') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                        
                          {{--  <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
										
                                        <input type="text" class="form-control" id="limit" name="limit" placeholder="name@example.com" value="{{ old('limit') }}">
                                        <label for="title">Maximum limit *</label>
                                    </div>
                                    @error('limit') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                        </div> --}}
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="title" name="gift_title" placeholder="name@example.com" value="{{ old('gift_title') }}">
                                        <label for="gift_title">Gift Name *</label>
                                    </div>
                                    @error('gift_title') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" id="image" name="gift_image" placeholder="Distributor name" value="">
                                        <label for="image">Gift Image *</label>
                                    </div>
                                    @error('gift_image') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-danger">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <section>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.offer.store') }}" enctype="multipart/form-data">
                    @csrf
                        <h4 class="page__subtitle">Add New</h4>
                        <div class="form-group mb-3">
                            <label class="label-control">Title <span class="text-danger">*</span> </label>
                            <input type="text" name="title" placeholder="" class="form-control" value="{{old('title')}}">
                            @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label-control">Status  </label>
                            <select id="is_current" name="is_current" class="form-control">
                                <option value="">--- Select  ---</option>
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                            </select>
                            @error('is_current') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label-control">Start date <span class="text-danger">*</span> </label>
                            <input type="date" name="start_date" placeholder="" class="form-control" value="{{old('start_date')}}">
                            @error('start_date') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label-control">End date <span class="text-danger">*</span> </label>
                            <input type="date" name="end_date" placeholder="" class="form-control" value="{{old('end_date')}}">
                            @error('end_date') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                          <div class="card">
                            <div class="card-header p-0 mb-3">Image <span class="text-danger">*</span></div>
                            <div class="card-body p-0">
                                <div class="w-100 product__thumb">
                                    <label for="thumbnail"><img id="output" src="{{ asset('admin/images/placeholder-image.jpg') }}" /></label>
                                </div>
                                <input type="file" name="image" id="thumbnail" accept="image/*" onchange="loadFile(event)" class="d-none">
                                <script>
                                    var loadFile = function(event) {
                                        var output = document.getElementById('output');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function() {
                                            URL.revokeObjectURL(output.src) // free memory
                                        }
                                    };
                                </script>
                            </div>
                            @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="card">
                            <div class="card-header p-0 mb-3">Document <span class="text-danger">*</span></div>
                            <div class="card-body p-0">
                                <div class="form-group">
                                    <label for="upload_file" class="control-label col-sm-3">Upload File</label>
                                    <div class="col-sm-9">
                                         <input class="form-control" type="file" name="pdf" id="pdf">
                                    </div>
                               </div>
                            </div>
                            @error('pdf') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-danger">Add New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection

@section('script')
<script>
     $(document).on('click','.addNewTime',function(){
		var thisClickedBtn = $(this);
		thisClickedBtn.removeClass(['addNewTime','btn-success']);
		thisClickedBtn.addClass(['removeTimePrice','btn-danger']).text('X');

		var toAppend = `
<a class="btn btn-sm btn-success actionTimebtn addNewTime">+</a>
       <div class="row mb-2">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control" id="start_date" name="start_date[]" placeholder="name@example.com" value="{{ old('start_date') }}">
                                        <label for="start_date">Validity from *</label>
                                    </div>
                                    @error('start_date') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control" id="end_date" name="end_date[]" placeholder="name@example.com" value="{{ old('end_date') }}">
                                        <label for="end_date">Validity to *</label>
                                    </div>
                                    @error('end_date') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                        </div>
						 {{-- <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
										
                                        <input type="text" class="form-control" id="title" name="multiple_user_count" placeholder="name@example.com" value="{{ old('multiple_user_count') }}">
										<p class="text-danger">multiple user count</p>
                                        <label for="title">User count *</label>
                                    </div>
                                    @error('multiple_user_count') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div> --}}
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
										
                                        <input type="text" class="form-control" id="title" name="user_count[]" placeholder="name@example.com" value="{{ old('user_count') }}">
                                        <label for="title">User count *</label>
                                    </div>
                                    @error('title') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                        
                          {{--  <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
										
                                        <input type="text" class="form-control" id="limit" name="limit[]" placeholder="name@example.com" value="{{ old('limit') }}">
                                        <label for="title">Maximum limit *</label>
                                    </div>
                                    @error('limit') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                        </div> --}}
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="title" name="gift_title[]" placeholder="name@example.com" value="{{ old('gift_title') }}">
                                        <label for="gift_title">Gift Name *</label>
                                    </div>
                                    @error('gift_title') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" id="image" name="gift_image[]" placeholder="Distributor name" value="">
                                        <label for="image">Gift Image *</label>
                                    </div>
                                    @error('gift_image') <p class="small text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            
                        </div>
        `;

		$('#timePriceTable').append(toAppend);
	});
$(document).on('click','.removeTimePrice',function(){
		var thisClickedBtn = $(this);
		thisClickedBtn.closest('tr').remove();
	});
</script>
@endsection
