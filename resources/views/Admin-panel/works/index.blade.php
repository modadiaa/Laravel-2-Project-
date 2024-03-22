@extends('layouts.admin.admin')
@section('title', __("site.works"))
@section('content')
    <div class="mt-4">
        <button type="button" class="button x-small mb-3" data-toggle="modal" data-target="#exampleModal">
            @lang('site.add')
        </button>
    </div>

    <form method="GET" action="{{ route('works.index') }}">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="البحث" value="{{ request()->search }}">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> @lang('site.add') </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('works.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">@lang('site.name_ar')</label>
                                    <input required="required" name = "name[ar]" type="text" class="@error('name') is-invalid @enderror form-control"
                                     aria-describedby="emailHelp">
                                    @error('name[ar]')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name_en">  @lang('site.name_en')  </label>
                                    <input required="required" id="name" name = "name[en]" type="text" class="@error('name') is-invalid @enderror form-control"
                                      aria-describedby="emailHelp">
                                    @error('name[en]')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">@lang('site.slug')</label>
                                    <input required="required" id="slug"  name = "slug" type="text" class="@error('name') is-invalid @enderror form-control"
                                     aria-describedby="emailHelp">
                                    @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="desc">@lang('site.desc_ar')  </label>
                                <textarea name="description[ar]"  cols="30" rows="10" class="@error('description') is-invalid @enderror form-control ckeditor"></textarea>
                                @error('description[ar]')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="desc">@lang('site.desc_en')   </label>
                                <textarea name="description[en]"  cols="30" rows="10" class="@error('description') is-invalid @enderror form-control ckeditor"></textarea>
                                @error('description[en]')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname">@lang('site.image')  </label>
                                    <input required="required" name = "image" type="file"
                                     class="@error('image') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
    @include('layouts.admin.success')
    @include('layouts.admin.error')
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>  @lang('site.name') </th>
                <th>  @lang('site.product_image') </th>
                <th>  @lang('site.oper') </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($works as $key =>  $work)
                    <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$work->name}}</td>
                    <td><img src='{{asset("/uploads/work/".$work->image."")}}'  width="100"></td>
                    <td>
                        {{--  @if(auth('admin')->user()->store_id == null)  --}}
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $work->id }}"
                                title="Edit"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $work->id }}"
                                title="Delete"><i
                                class="fa fa-trash"></i></button>
                        {{--  @endif  --}}
                    </td>
                </tr>
                <!-- edit_modal_product -->
                <div class="modal fade" id="edit{{ $work->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{route('works.update','test')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="{{$work->id}}" name="work_id">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fname">@lang('site.product_name')   </label>
                                                <input value="{{$work->name}}" required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname"
                                                aria-describedby="emailHelp">
                                                @error('name_ar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fname">@lang('site.slug')   </label>
                                                <input value="{{$work->slug}}" required="required" name = "slug" type="text" class="@error('name') is-invalid @enderror form-control" id="fname"
                                                aria-describedby="emailHelp">
                                                @error('name_ar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="desc">   @lang('site.product_desc')    </label>
                                            <textarea value="{{$work->description}}" name="description" id="desc" cols="30" rows="10" class="@error('description_ar') is-invalid @enderror form-control ckeditor">
                                                {{$work->description}}</textarea>
                                            @error('description_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">@lang('site.product_image') </label>
                                                <input name = "image" type="file" class="@error('image') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="col-12">
                                           <h2>seo</h2>
                                           <label for="keyword">@lang('site.keywords')  </label>
                                           <textarea required="required" value="{{ $work->keyword}}" name="keyword" id="" cols="30" rows="10"
                                           class="@error('description') is-invalid
                                           @enderror form-control ckeditor">{!! $work->keyword !!}</textarea>
                                           @error('keyword')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                       </div>

                                       <div class="col-12">
                                           <label for="keyword">@lang('site.optionn')  </label>
                                           <textarea required="required" value="{{ $work->optionn}}" name="optionn" id="" cols="30" rows="10"
                                           class="@error('description') is-invalid
                                           @enderror form-control ckeditor">{!! $work->optionn !!}</textarea>
                                           @error('optionn')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                <!-- delete_modal_product -->
                <div class="modal fade" id="delete{{ $work->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                      @lang('site.delete') <b>{{ $work->name }}</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('works.destroy','test')}}"
                                      method="post">
                                    {{ method_field('Delete') }}
                                    @csrf
                                    @lang('site.areyou')
                                    <input id="id" type="hidden" name="work_id" class="form-control"
                                           value="{{ $work->id }}">
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


        {{$works->links()}}


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




    <script src="{{ URL::asset('assets/Admin/js/jquery-3.3.1.min.js') }}"></script>
    <script>
        $(function (){
            if ($('.is_offer').is(':checked')) {
                $(".new_price").removeClass('d-none');
            }else{
                $(".new_price").addClass('d-none');
            }
            $(".is_offer").on('change',function(){
                if ($(this).is(':checked')) {
                    $(".new_price").removeClass('d-none');
                }else{
                    $(".new_price").addClass('d-none');
                }
            });
        });
    </script>

@endsection
