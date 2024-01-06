@extends('admin.layouts.master')

@section('css')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الأخبار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة خبر</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
			
								<form action="{{ route('news.save') }}" method="post" enctype="multipart/form-data" autocomplete="off">
									{{ csrf_field() }}
			
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">عنوان الخبر </label>
											<input type="text" class="form-control" id="inputName" name="title"
												title="يرجى إدخال عنوان الخبر" required>
										</div>
									</div><br>
			
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">slug</label>
											<input type="text" class="form-control" id="inputName" name="slug" required>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="exampleTextarea">المحتوى</label>
											<textarea class="form-control" id="exampleTextarea" name="content" rows="3"></textarea>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">اسم الكاتب </label>
											<input type="text" class="form-control" id="inputName" name="composer_id"
												title="يرجى إدخال اسم الكاتب " required>
										</div>
									</div><br>

									<div class="form-group">
										<label>التصنيف</label>
										<select name="category_id" class="form-control select">
											
											@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->category_name}}</option>
											@endforeach 

										</select>
									</div><br>

									<div class="form-group">
										<label>الوسوم</label>
										<select name="tag_id" class="form-control">
											
											@foreach($tags as $tag)
											<option value="{{$tag->id}}">{{$tag->tag_name}}</option>
											@endforeach 

										</select>
									</div><br>

									<div class="form-group">
										<label class="display-block">حالة الخبر</label> <br>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="status" id="status_active" value="1" checked>
											<label class="form-check-label" for="status_active">
												&nbsp; فعال 
											</label>
										</div> 
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="status" id="status_inactive" value="0">
											<label class="form-check-label" for="status_inactive">
												&nbsp; غير فعال
											</label>
										</div>
									</div>
			
									<div class="d-flex justify-content-center">
										<button type="submit" class="btn btn-primary">حفظ البيانات</button>
									</div>
			
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

@endsection

@section('js')

{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> --}}

@endsection
