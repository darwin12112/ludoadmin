@extends('admin.layout.master')
@section('title')
 All FAQ
@endsection
@section('css')
 <!--  link custom css link here -->
@endsection
@section('content')
 <!-- BEGIN: Content-->
   <div class="row">
     <!-- Bootstrap Validation -->
      <div class="col-md-12 col-12">
        <div class="card">
          <div class="card-header">
            <p class="card-title"><i class="las la-sliders-h"></i> All FAQ List</p>
            <a href="{{url('/')}}/admin/faq/add"><button class="btn btn-orange border-0 round"><i class="las la-plus-circle"></i> Add New FAQ</button></a>
          </div>
              @if(session()->get('error'))
            <div class="alert alert-danger alert-dismissible ml-1 mr-1" id="notice_msg" role="alert">
                <div class="alert-body">
                 <b>{{session()->get('error')}}</b>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                 @elseif(session()->get('success'))
                    <div class="alert alert-success alert-dismissible ml-1 mr-1" id="success_msg" role="alert">
                        <div class="alert-body">
                         <b>{{session()->get('success')}}</b>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($faq as $key =>$result)
                  <tr>
                    <td><span class="font-weight-bold">{{ $faq->firstItem() + $key }}</span></td>
                    <td title="{{$result->faq_title}}">{{ \Illuminate\Support\Str::limit($result->faq_title,20, $end='...') }}</td>
                    <td title="{{$result->faq_desc}}">{{ \Illuminate\Support\Str::limit($result->faq_desc,200, $end='...') }}</td>
                    <td>
                      {{-- <button type="button" delete-id="{{$result->id}}" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-icon btn-icon rounded-circle btn-success bg-darken-4 border-0 view_buuton">
                       <i class="las la-eye"></i>
                      </button> --}}
                      <a href="{{url('admin/faq/edit/'.Crypt::encrypt($result->id))}}">
                        <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-icon btn-icon rounded-circle btn-primary bg-darken-4 border-0 edit_buuton">
                         <i class="las la-highlighter"></i>
                        </button>
                      </a>
                      <button type="button" delete-id="{{$result->id}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-icon btn-icon rounded-circle btn-danger bg-darken-4 border-0 delete_buuton">
                       <i class="las la-trash"></i>
                      </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="my-1">
            {{ $faq->onEachSide(3)->links('vendor.pagination.custom') }}
            </div>
          </div>
        </div>
      </div>
      <!-- /Bootstrap Validation -->

  </div>
    <!-- END: Content-->
@endsection
@section('js')
<script src="{{URL::asset('admin-assets/css/custom/js/FAQ/faq.js')}}"></script>
@endsection
