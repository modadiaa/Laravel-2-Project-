@extends('layouts.admin.admin')
@section('title', __("site.videos"))
@section('css')
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css') }}">
@endsection
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
                    <form action="{{route('video.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname">  @lang('site.name_about_ar')</label>
                                    <input  name = "name[ar]" type="text" class="@error('name') is-invalid @enderror form-control"
                                    id="" aria-describedby="emailHelp">

                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name"> @lang('site.name_about_en') </label>
                                    <input  name = "name[en]"  id="name"  type="text" class="@error('name') is-invalid @enderror form-control"
                                    aria-describedby="emailHelp">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name"> @lang('site.slug') </label>
                                    <input  name = "slug"  id="slug"  type="text" class="@error('slug') is-invalid @enderror form-control"
                                    aria-describedby="emailHelp">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name"> @lang('site.link') </label>
                                    <input  name = "link"  id="link"  type="text" class="@error('link') is-invalid @enderror form-control"
                                    aria-describedby="emailHelp">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label for="image">@lang('site.image') </label>
                                <input  name = "image" type="file" class="@error('image') is-invalid @enderror form-control"
                                 aria-describedby="emailHelp">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr><hr>
                        <h2>Seo</h2>
                            <div class="col-12">
                                <label for="desc">@lang('site.keywords_ar')</label>
                                <textarea  name="keyword[ar]"  cols="30" rows="10"
                                 class="@error('keyword') is-invalid @enderror form-control ckeditor">
                                </textarea>
                                @error('keyword')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="desc">@lang('site.keywords_en')</label>
                                <textarea  name="keyword[en]"  cols="30" rows="10"
                                 class="@error('keyword') is-invalid @enderror form-control ckeditor">
                                </textarea>
                                @error('keyword')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="desc">@lang('site.option_ar')</label>
                                <textarea  name="optionn[ar]"  cols="30" rows="10"
                                 class="@error('option') is-invalid @enderror form-control ckeditor">
                                </textarea>
                                @error('option')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="desc">@lang('site.option_en')</label>
                                <textarea  name="optionn[en]"  cols="30" rows="10"
                                 class="@error('option') is-invalid @enderror form-control ckeditor">
                                </textarea>
                                @error('option')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
                <th> @lang('site.name_about') </th>
                <th>@lang('site.image') </th>
                <th>@lang('site.link') </th>
                <th>@lang('site.oper_about') </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($videos as $key =>  $video)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $video->name ?? '' }}</td>

                        <td><img src='{{asset("/uploads/videos/".$video->image."")}}'  width="100"></td>
                        <td>{{ $video->link ?? '' }}</td>

                        <td>
                            {{--  @if(auth('admin')->user()->store_id == null)  --}}
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $video->id }}"
                                    title="Edit"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $video->id }}"
                                    title="Delete"><i
                                    class="fa fa-trash"></i></button>
                            {{--  @endif  --}}
                        </td>
                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit{{ $video->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        تعديل
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- edit_form -->
                                    <form action="{{route('video.update','test')}}" method="post"  enctype="multipart/form-data">
                                        {{ method_field('put') }}
                                        @csrf
                                        <input type="hidden" name="video_id" value="{{ $video->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">   @lang('site.name_about') </label>
                                                    <input required="required" value="{{ $video->name}}" name="name" type="text" class="@error('name') is-invalid
                                                     @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">   @lang('site.slug') </label>
                                                    <input  value="{{ $video->slug}}" name ="slug" type="text" class=" form-control" id="fname" aria-describedby="emailHelp">

                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">   @lang('site.link') </label>
                                                    <input required="required" value="{{ $video->link}}" name ="link" type="text" class="@error('link') is-invalid
                                                     @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image">@lang('site.image_1')  </label>
                                                    <input name="image" type="file" class="@error('image') is-invalid @enderror form-control" id="image"
                                                     aria-describedby="emailHelp">
                                                    @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <br><br>

                                        <div class="col-12">
                                           <h2>seo</h2>
                                           <label for="keyword">@lang('site.keywords')  </label>
                                           <textarea required="required" value="{{ $video->keyword}}" name="keyword" id="" cols="30" rows="10"
                                           class="@error('description') is-invalid
                                           @enderror form-control ckeditor">{!! $video->keyword !!}</textarea>
                                           @error('keyword')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                       </div>

                                       <div class="col-12">
                                           <label for="keyword">@lang('site.optionn')  </label>
                                           <textarea required="required" value="{{ $video->optionn}}" name="optionn" id="" cols="30" rows="10"
                                           class="@error('description') is-invalid
                                           @enderror form-control ckeditor">{!! $video->optionn !!}</textarea>
                                           @error('optionn')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                    <div class="modal fade" id="delete{{ $video->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        @lang('site.delete') <b>{{ $video->name }}</b>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('video.destroy','test')}}"
                                          method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        @lang('site.areyou')
                                        <input id="id" type="hidden" name="video_id" class="form-control"
                                               value="{{ $video->id }}">
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
        <script src="{{ URL::asset('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js') }}"></script>

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
