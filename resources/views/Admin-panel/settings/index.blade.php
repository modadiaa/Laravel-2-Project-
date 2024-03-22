@extends('layouts.admin.admin')
@section('title', __("site.setting"))
@section('content')
    <div class="mt-4">
        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                      @lang('site.add')
        </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">  @lang('site.add') </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">
                                        @lang('site.name')
                                     </label>
                                    <input  name="title[ar]" type="text"
                                    class="form-control" id="fname" aria-describedby="emailHelp">

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">
                                        @lang('site.name_en')
                                     </label>
                                    <input  name="title[en]" type="text"
                                    class="form-control" id="fname" aria-describedby="emailHelp">

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">
                                        @lang('site.email')
                                     </label>
                                    <input  name="email" type="text"
                                    class="form-control" id="fname" aria-describedby="emailHelp">

                                </div>
                            </div>





                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
                            <button type="submit" class="btn btn-primary">@lang('site.add')</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <br><br>
    @include('layouts.admin.success')
    @include('layouts.admin.error')
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>  @lang('site.name') </th>
                <th> @lang('site.email')</th>
                <th> @lang('site.oper')</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($setting as $key =>  $sett)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{  $sett->title ?? ''}}</td>
                        <td>{!!  $sett->email ?? '' !!}</td>
                        <td>
                            {{--  @if(auth('admin')->user()->store_id == null)  --}}
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $sett->id }}"
                                    title="Edit"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $sett->id }}"
                                    title="Delete"><i
                                    class="fa fa-trash"></i></button>
                            {{--  @endif  --}}
                        </td>
                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit{{ $sett->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                          @lang('site.edit')
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- edit_form -->
                                    <form action="{{route('settings.update','test')}}" method="post"  enctype="multipart/form-data">
                                        {{ method_field('patch') }}
                                        @csrf
                                        <input type="hidden" name="sett_id" value="{{ $sett->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">     @lang('site.title')</label>
                                                    <input value="{{ $sett->title }}" name = "title"
                                                    type="text" class="form-control" id="fname" aria-describedby="emailHelp">

                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">     @lang('site.email')</label>
                                                    <input value="{{ $sett->email }}" name = "email"
                                                    type="text" class="form-control" id="fname" aria-describedby="emailHelp">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">@lang('site.close')</button>
                                            <button type="submit"
                                                    class="btn btn-success">@lang('site.update')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- delete_modal_Grade -->
                    <div class="modal fade" id="delete{{ $sett->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        @lang('site.delete') <b>{{ $sett->name }}</b>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('settings.destroy','test')}}"
                                          method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                         @lang('site.areyou')
                                        <input id="id" type="hidden" name="sett_id" class="form-control"
                                               value="{{ $sett->id }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">@lang('site.close')</button>
                                            <button type="submit"
                                                    class="btn btn-danger">@lang('site.delete')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </table>
        <script src="{{ URL::asset('assets/Admin/js/jquery-3.3.1.min.js') }}"></script>
        <script>
            $('input:radio[name="type"]').change(
                function(){
                    if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                        $('#cats_list').removeClass('d-none');
                    }else{
                        $('#cats_list').addClass('d-none');
                    }
                });
        </script>
    </div>


@stop
