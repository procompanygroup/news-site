@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">التصنيفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل تصنيف</span>
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


<<<<<<< HEAD

@if (session()->has('Edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Edit') }}</strong>
=======
@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('edit') }}</strong>
>>>>>>> de2062e79b5bc27240556b6b6963cf3d2e77b4a7
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

<<<<<<< HEAD
=======

>>>>>>> de2062e79b5bc27240556b6b6963cf3d2e77b4a7
				<!-- row -->
				<div class="row">

					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
			
<<<<<<< HEAD
								<form action="{{ route('category.update', $category->id) }}" method="post" autocomplete="off">
									{{-- {{ method_field('patch') }} --}}
									{{ csrf_field() }}

=======
								<form action="{{ route('category.update', ['id' => $category->id])) }}" method="post" autocomplete="off">
									{{ method_field('patch') }}
									{{ csrf_field() }}

						

>>>>>>> de2062e79b5bc27240556b6b6963cf3d2e77b4a7
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">اسم التصنيف</label>
											<input type="hidden" name="id" value="{{ $category->id }}">
											<input type="text" class="form-control" id="inputName" name="category_name"
												title="يرجى إدخال عنوان التصنيف" value="{{ $category->category_name }}" required>
<<<<<<< HEAD
										</div>
									</div><br>

									<div class="form-group">
										<label>التصنيف الأب</label>
										<select name="parent_id" class="form-control select">
											
											 @foreach($parents as $parent)
											<option value="{{$parent->id}}">{{$parent->category_name}}</option>
											@endforeach 

										</select>
									</div>

=======
										</div><br>
			
>>>>>>> de2062e79b5bc27240556b6b6963cf3d2e77b4a7
									<div class="row">
										<div class="col">
											<label for="exampleTextarea">الوصف</label>
											<textarea class="form-control" id="exampleTextarea" name="category_description" rows="3">
											{{ $category->category_description }}</textarea>
										</div>
									</div><br>
			
									<div class="d-flex justify-content-center">
										<button type="submit" class="btn btn-primary">حفظ البيانات</button>
									</div>
			
								</form>
							</div>
						</div>
					</div>
<<<<<<< HEAD
					
=======

>>>>>>> de2062e79b5bc27240556b6b6963cf3d2e77b4a7
				</div>
				<!-- row closed -->
@endsection

@section('js')
@endsection
