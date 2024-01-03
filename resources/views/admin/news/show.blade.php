@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الأخبار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جميع الأخبار</span>
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
				<!-- row -->
					<div class="row row-sm">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">جميع الأخبار</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table text-md-nowrap" id="example1">
											<thead>
												<tr>
													<th class="wd-15p border-bottom-0">#</th>
													<th class="wd-15p border-bottom-0">عنوان الخبر</th>
													<th class="wd-20p border-bottom-0">المحتوى</th>
													<th class="wd-15p border-bottom-0">اسم الكاتب</th>
													<th class="wd-15p border-bottom-0">التصنيف</th>
													<th class="wd-15p border-bottom-0">الحالة</th>
													<th class="wd-10p border-bottom-0">العمليات</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1 ?>
												@foreach($news as $new)
												<tr>
													<td>{{ $i++ }}</td>
													<td>{{ $new->title }}</td>
													<td>{{ $new->content }}</td>
													<td>{{ $new->composer_id }}</td>
													<td>{{ $new->category_id }}</td>
													<td>{{ $new->status }}</td>
													<td>
														<a class="btn btn-sm btn-info" href="" title="تعديل"><i class="las la-pen"></i></a>
	
														<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
														data-id="{{ $new->id }}" data-title="{{ $new->title }}" data-toggle="modal"
														href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>
													</td> 
													
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!--/div-->
					</div>
				<!-- row closed -->
@endsection

@section('js')
@endsection
