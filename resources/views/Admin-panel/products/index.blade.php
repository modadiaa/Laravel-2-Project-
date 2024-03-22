@extends('layouts.admin.admin')
@section('title', __("site.products"))
@section('content')
    <div class="mt-4">
        <button type="button" class="button x-small mb-3" data-toggle="modal" data-target="#exampleModal">
            @lang('site.add')
        </button>
    </div>

    <form method="GET" action="{{ route('products.index') }}">
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
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">@lang('site.name_product_ar')</label>
                                    <input required="required" name = "name[ar]" type="text" class="@error('name') is-invalid @enderror form-control"
                                     aria-describedby="emailHelp">
                                    @error('name[ar]')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name_en">  @lang('site.name_product_en')  </label>
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
                                <label for="desc">@lang('site.product_desc_ar')  </label>
                                <textarea name="description[ar]"  cols="30" rows="10" class="@error('description') is-invalid @enderror form-control ckeditor"></textarea>
                                @error('description[ar]')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="desc">@lang('site.product_desc_en')   </label>
                                <textarea name="description[en]"  cols="30" rows="10" class="@error('description') is-invalid @enderror form-control ckeditor"></textarea>
                                @error('description[en]')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname">@lang('site.product_image')  </label>
                                    <input required="required" name = "image" type="file"
                                     class="@error('image') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">@lang('site.cat')</label>
                                <select required="required" name="category_id" class="form-control @error('category_id') is-invalid @enderror"
                                 id="">
                                    <option value="">@lang('site.choose')</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname"> @lang('site.status')</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="1"> @lang('site.active') </option>
                                        <option value="0"> @lang('site.notactive') </option>
                                    </select>
                                    @error('status')
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

    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>  @lang('site.name') </th>
                <th>  @lang('site.product_image') </th>
                <th>  @lang('site.cat') </th>
                <th>  @lang('site.status') </th>
                <th>  @lang('site.oper') </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $key =>  $product)
                    <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$product->name}}</td>
                    <td><img src='{{asset("/uploads/products/".$product->image."")}}'  width="100"></td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->status != 0 ? 'مفعل' : 'غير مفعل'}}</td>
                    <td>
                        {{--  @if(auth('admin')->user()->store_id == null)  --}}
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $product->id }}"
                                title="Edit"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $product->id }}"
                                title="Delete"><i
                                class="fa fa-trash"></i></button>
                        {{--  @endif  --}}
                    </td>
                </tr>
                <!-- edit_modal_product -->
                <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{route('products.update','test')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fname">@lang('site.product_name')   </label>
                                                <input value="{{$product->name}}" required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname"
                                                aria-describedby="emailHelp">
                                                @error('name_ar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fname">@lang('site.slug')   </label>
                                                <input value="{{$product->slug}}" required="required" name = "slug" type="text" class="@error('name') is-invalid @enderror form-control" id="fname"
                                                aria-describedby="emailHelp">
                                                @error('name_ar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="desc">   @lang('site.product_desc')    </label>
                                            <textarea value="{{$product->description}}" name="description" id="desc" cols="30" rows="10" class="@error('description_ar') is-invalid @enderror form-control ckeditor">
                                                {{$product->description}}</textarea>
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


                                        <div class="col-6">
                                            <label for="">@lang('site.cat') </label>
                                            <select required="required" name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                                                <option value="">@lang('site.choose')</option>
                                                @foreach ($categories as $cat)
                                                    <option {{$product->category_id == $cat->id ? 'selected' : ''}} value="{{ $cat->id }}">{{ $cat->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">@lang('site.status') </label>
                                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                    <option {{$product->status == 1 ? 'selected' : ''}} value="1">@lang('site.active')</option>
                                                    <option {{$product->status == 0 ? 'selected' : ''}} value="0">@lang('site.notactive') </option>
                                                </select>
                                                @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <br><br>

                                             <div class="col-12">
                                                <h2>seo</h2>
                                                <label for="keyword">@lang('site.keywords')  </label>
                                                <textarea required="required" value="{{ $product->keyword}}" name="keyword" id="" cols="30" rows="10"
                                                class="@error('description') is-invalid
                                                @enderror form-control ckeditor">{!! $product->keyword !!}</textarea>
                                                @error('keyword')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="keyword">@lang('site.optionn')  </label>
                                                <textarea required="required" value="{{ $product->optionn}}" name="optionn" id="" cols="30" rows="10"
                                                class="@error('description') is-invalid
                                                @enderror form-control ckeditor">{!! $product->optionn !!}</textarea>
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
                <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                      @lang('site.delete') <b>{{ $product->name }}</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('products.destroy','test')}}"
                                      method="post">
                                    {{ method_field('Delete') }}
                                    @csrf
                                    @lang('site.areyou')
                                    <input id="id" type="hidden" name="product_id" class="form-control"
                                           value="{{ $product->id }}">
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


        {{$products->links()}}


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
