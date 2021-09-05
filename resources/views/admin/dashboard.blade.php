@extends('layouts.backend.app')

@section('content')
<style>
    .decoration-none{
        text-decoration: none !important;
    }
</style>
<div class="container">
    <div class="row clearfix pt-5">
        <div class="col-lg-3 mb-4 col-md-3 col-sm-6 col-xs-12">
            <a href="{{route('admin.category.create')}}" class="decoration-none">
                <div class="pb-2 pt-4 px-4 bg-white" style="border-radius: 5px;border: solid 0.5px #d3d2d8;">
                    <img src="{{ asset('assets/backend/images/manager.svg') }}" width="35px">
                    <h6 class="bold text-dark pt-2">Add New Category</h6>
                    <p class="text-dark" style="font-size: 11px;">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-4 col-md-3 col-sm-6 col-xs-12">
            <a href="{{route('admin.subCategory.create')}}" class="decoration-none">
                <div class="pb-2 pt-4 px-4 bg-white" style="border-radius: 5px;border: solid 0.5px #d3d2d8;">
                    <img src="{{ asset('assets/backend/images/manager.svg') }}" width="35px">
                    <h6 class="bold text-dark pt-2">Add Sub Category</h6>
                    <p class="text-dark" style="font-size: 11px;">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-4 col-md-3 col-sm-6 col-xs-12">
            <a href="{{route('admin.product.create')}}" class="decoration-none">
                <div class="pb-2 pt-4 px-4 bg-white" style="border-radius: 5px;border: solid 0.5px #d3d2d8;">
                    <img src="{{ asset('assets/backend/images/manager.svg') }}" width="35px">
                    <h6 class="bold text-dark pt-2">Add New Product</h6>
                    <p class="text-dark" style="font-size: 11px;">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-4 col-md-3 col-sm-6 col-xs-12">
            <a href="{{route('admin.testimonials.create')}}" class="decoration-none">
                <div class="pb-2 pt-4 px-4 bg-white" style="border-radius: 5px;border: solid 0.5px #d3d2d8;">
                    <img src="{{ asset('assets/backend/images/manager.svg') }}" width="35px">
                    <h6 class="bold text-dark pt-2">Add New Testimonial</h6>
                    <p class="text-dark" style="font-size: 11px;">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
