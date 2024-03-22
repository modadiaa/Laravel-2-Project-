@extends('layouts.admin.admin')
@section('title', __("site.slider"))
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
                    <h5 class="modal-title" id="exampleModalLabel">@lang('site.add')  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-12">

                            <div class="form-group">
                                    <label for="fname">
                                        @lang('site.name_ar')
                                     </label>
                                    <input  name="small_title[ar]" type="text"
                                    class="form-control" id="fname" aria-describedby="emailHelp">

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">
                                        @lang('site.name_en')
                                      </label>
                                    <input  name="small_title[en]" type="text"
                                    class="form-control" id="fname" aria-describedby="emailHelp">

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">@lang('site.img_slider') </label>
                                    <input required="required" name = "image" type="file" class="@error('image') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">
                                        @lang('site.desc_ar')
                                          </label>
                                    <textarea  name="big_title[ar]" id="big_title_ar" cols="30" rows="10"
                                    class="form-control ckeditor"></textarea>


                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">
                                        @lang('site.desc_en')
                                    </label>
                                    <textarea  name="big_title[en]" id="big_title_en" cols="30" rows="10" class="form-control ckeditor"></textarea>

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
                <th> @lang('site.image_slider')</th>
                <th> @lang('site.oper_slider')</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sliders as $key =>  $slide)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{  $slide->small_title ?? ''}}</td>
                        <td><img src='{{asset("uploads/sliders/".$slide->image."")}}'  width="100"></td>
                        <td>
                            {{--  @if(auth('admin')->user()->store_id == null)  --}}
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $slide->id }}"
                                    title="Edit"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $slide->id }}"
                                    title="Delete"><i
                                    class="fa fa-trash"></i></button>
                            {{--  @endif  --}}
                        </td>
                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit{{ $slide->id }}" tabindex="-1" role="dialog"
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
                                    <form action="{{route('sliders.update','test')}}" method="post"  enctype="multipart/form-data">
                                        {{ method_field('patch') }}
                                        @csrf
                                        <input type="hidden" name="slide_id" value="{{ $slide->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">     @lang('site.name_slider')</label>
                                                    <input value="{{ $slide->small_title }}" name = "small_title"
                                                    type="text" class="form-control" id="fname" aria-describedby="emailHelp">

                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">@lang('site.desc_slider')  </label>
                                                    <textarea  value="{!! $slide->big_title !!}" name="big_title" id="desc" cols="30" rows="10"
                                                        class="form-control ckeditor">{!! $slide->big_title !!}</textarea>

                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="fname"> @lang('site.image_slider') </label>
                                                    <input name ="image" type="file" class="@error('image') is-invalid @enderror
                                                     form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
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
                    <div class="modal fade" id="delete{{ $slide->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        @lang('site.delete') <b>{{ $slide->name }}</b>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('sliders.destroy','test')}}"
                                          method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                         @lang('site.areyou')
                                        <input id="id" type="hidden" name="slide_id" class="form-control"
                                               value="{{ $slide->id }}">
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
