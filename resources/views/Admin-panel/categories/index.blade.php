@extends('layouts.admin.admin')
@section('title', __("site.categories"))
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
                    <h5 class="modal-title" id="exampleModalLabel"> @lang('site.add')  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">@lang('site.category_section_ar')  </label>
                                    <input required="required" name ="name[ar]" autocomplete="off"  type="text" class="@error('name') is-invalid @enderror form-control" aria-describedby="emailHelp">

                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">@lang('site.category_section_en')  </label>
                                    <input required="required" id="names"  name= "name[en]"   autocomplete="off"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">@lang('site.slug')  </label>
                                    <input  name= "slug" autocomplete="off"   type="text" class="@error('slug') is-invalid @enderror form-control" id="slug" aria-describedby="emailHelp">

                                    @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="desc">@lang('site.category_desc_ar')   </label>
                                <textarea required="required" name="description[ar]" id="description" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control ckeditor"></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="desc">@lang('site.category_desc_en')   </label>
                                <textarea required="required" name="description[en]"   id="description" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control ckeditor"></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="fname"> @lang('site.category_image')  </label>
                                <input required="required" name = "image" type="file" class="@error('image') is-invalid @enderror form-control" id="image"
                                 aria-describedby="emailHelp">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row d-none" id="cats_list" >
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="projectinput1"> @lang('site.category_choice')
                                    </label>
                                    <select name="parent" class="select2 form-control">
                                        <option value=""> @lang('site.category_choicee') </option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('parent')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>@lang('site.category_main')  </label>
                                <input type="radio" name="type" value="1" checked class="switchery"data-color="success"/>
                            </div>
                            <div class="col-md-4">
                                <label>@lang('site.category_sub') </label>
                                <input type="radio" name="type" value="2" class="switchery" data-color="success"/>
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

    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>    @lang('site.name')   </th>
                <th>   @lang('site.category_image')  </th>
                <th>   @lang('site.category_main') </th>
                <th>   @lang('site.oper') </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $key =>  $cat)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $cat->name ?? '' }}</td>

                        <td><img src='{{asset("/uploads/category/".$cat->image."")}}'  width="100"></td>
                        <td>{{ $cat->_parent ? $cat->_parent->name : '-'}}</td>
                        <td>
                            {{--  @if(auth('admin')->user()->store_id == null)  --}}
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $cat->id }}"
                                    title="Edit"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $cat->id }}"
                                    title="Delete"><i
                                    class="fa fa-trash"></i></button>
                            {{--  @endif  --}}
                        </td>
                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit{{ $cat->id }}" tabindex="-1" role="dialog"
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
                                    <form action="{{route('categories.update','test')}}" method="post"  enctype="multipart/form-data">
                                        {{ method_field('patch') }}
                                        @csrf
                                        <input type="hidden" name="cat_id" value="{{ $cat->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">    @lang('site.category_section') </label>
                                                    <input required="required" value="{{ $cat->name }}" id="name" name ="name" type="text" class="@error('name') is-invalid
                                                     @enderror form-control"  aria-describedby="emailHelp">
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">    @lang('site.slug') </label>
                                                    <input required="required" value="{{ $cat->slug}}" id="slug" name ="slug" type="text" class="@error('name') is-invalid
                                                     @enderror form-control"  aria-describedby="emailHelp">
                                                    @error('slug')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="desc">    @lang('site.category_desc')</label>
                                                <textarea required="required" value="{!! $cat->description !!}" name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid
                                                @enderror form-control ckeditor">{!! $cat->description !!}</textarea>
                                                @error('description_ar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="fname">   @lang('site.category_image')</label>
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
                                                <textarea required="required" value="{{ $cat->keyword}}" name="keyword" id="" cols="30" rows="10"
                                                class="@error('description') is-invalid
                                                @enderror form-control ckeditor">{!! $cat->keyword !!}</textarea>
                                                @error('keyword')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="keyword">@lang('site.optionn')  </label>
                                                <textarea required="required" value="{{ $cat->optionn}}" name="optionn" id="" cols="30" rows="10"
                                                class="@error('description') is-invalid
                                                @enderror form-control ckeditor">{!! $cat->optionn !!}</textarea>
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
                    <!-- delete_modal_Grade -->
                    <div class="modal fade" id="delete{{ $cat->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        @lang('site.delete')  <b>{{ $cat->name }}</b>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('categories.destroy','test')}}"
                                          method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        @lang('site.areyou')
                                        <input id="id" type="hidden" name="cat_id" class="form-control"
                                               value="{{ $cat->id }}">
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

        <script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js') }}"></script>








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

<script>
    // Copy written
    $(document).ready(function () {

        // Title  =>  Meta title.
        $("#names").on("input", function () {
            $("#names").val(this.value);
        });
        // Title => slug
        $("#names").keyup(function () {
            var Text = $(this).val();

            var slug = getSlug(Text);

            $("#slug").val(slug);

        });

    });
</script>









    </div>


@stop
