@extends('layouts.admin.admin')
@section('title', __("site.contacts"))
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
                    <h5 class="modal-title" id="exampleModalLabel">@lang('site.add')   </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('contacts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">   @lang('site.ar_name')</label>
                                    <input  name = "name[ar]" type="text" class="@error('name') is-invalid @enderror form-control" id="" aria-describedby="emailHelp">

                                    @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">   @lang('site.en_name')</label>
                                    <input  name = "name[en]"  id=""  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                                    @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">    @lang('site.email')</label>
                                    <input  name = "email"  id="email"  type="email" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="work_ar">     @lang('site.work_ar') </label>
                                    <input  name="workk[ar]"  id=""  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                                    @error('work')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="work">     @lang('site.work_en')  </label>
                                    <input  name = "workk[en]"  id=""  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                                    @error('work')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12">
                                <label for="description">   @lang('site.desc_ar') </label>
                                <textarea  name="description[ar]" id="" cols="30" rows="10" class="@error('description_ar') is-invalid @enderror form-control ckeditor"></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-12">
                                <label for="description">   @lang('site.desc_en')  </label>
                                <textarea  name="description[en]" id="" cols="30" rows="10" class="@error('address_ar') is-invalid @enderror form-control ckeditor"></textarea>

                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        <div class="col-12">
                            <label for="address">   @lang('site.address_ar') </label>
                            <textarea  name="address[ar]" id="" cols="30" rows="10" class="@error('address_ar') is-invalid @enderror form-control ckeditor"></textarea>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <label for="address">   @lang('site.address_en')  </label>
                            <textarea name="address[en]" id="" cols="30" rows="10" class="@error('address_en') is-invalid @enderror form-control ckeditor"></textarea>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <label for="mobile">   @lang('site.mobile')  </label>
                            <input  name = "mobile"  id="mobile"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="phone">   @lang('site.phone')  </label>
                            <input  name = "phone"  id="phone"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="fax">   @lang('site.fax') </label>
                            <input  name = "fax"  id="fax"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('fax')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="Facebook">    @lang('site.facebook') </label>
                            <input  name = "Facebook"  id="Facebook"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('Facebook')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="twitter">   @lang('site.twitter') </label>
                            <input  name = "twitter"  id="twitter"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('twitter')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="Youtube">   @lang('site.youtube') </label>
                            <input  name = "Youtube"  id="Youtube"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('Youtube')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="Instagram">   @lang('site.insta') </label>
                            <input  name = "Instagram"  id="Instagram"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('Instagram')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="Google">   @lang('site.gmail') </label>
                            <input  name = "Google"  id="Google"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('Google')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="telegram">   @lang('site.telegram') </label>
                            <input  name = "telegram"  id="telegram"  type="text" class="@error('name') is-invalid @enderror form-control"aria-describedby="emailHelp">
                            @error('telegram')
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

    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>  @lang('site.name')</th>
                <th>  @lang('site.email') </th>
                <th>  @lang('site.work') </th>
                <th>  @lang('site.oper') </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contacts as $key => $con)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $con->name}}</td>
                        <td>{{ $con->email}}</td>
                        <td>{{ $con->workk}}</td>

                        <td>
                            {{--  @if(auth('admin')->user()->store_id == null)  --}}
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $con->id }}"
                                    title="Edit"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $con->id }}"
                                    title="Delete"><i
                                    class="fa fa-trash"></i></button>
                            {{--  @endif  --}}
                        </td>
                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit{{ $con->id }}" tabindex="-1" role="dialog"
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
                                    <form action="{{route('contacts.update','test')}}" method="post" >
                                        {{ method_field('patch') }}
                                        @csrf
                                        <input type="hidden" name="con_id" value="{{ $con->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">@lang('site.name')   </label>
                                                    <input  value="{{ $con->name}}" name="name" type="text" class="@error('name') is-invalid
                                                     @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname"> @lang('site.email')  </label>
                                                    <input  value="{{ $con->email }}" name = "email" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="email" aria-describedby="emailHelp">
                                                    @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="work_en">     @lang('site.work') </label>
                                                    <input  value="{{ $con->workk }}" name="workk" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="email" aria-describedby="emailHelp">
                                                    @error('work')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="desc">  @lang('site.desc') </label>
                                                <textarea  name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid
                                                @enderror form-control ckeditor">{!! $con->description !!}</textarea>
                                                @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="col-12">
                                                <label for="address_en">   @lang('site.address') </label>
                                                <textarea  name="address" id="" cols="30" rows="10" class="@error('description') is-invalid
                                                @enderror form-control ckeditor">{!! $con->address !!}</textarea>
                                                @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="mobile">    @lang('site.mobile') </label>
                                                    <input  value="{{ $con->mobile }}" name = "mobile" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('mobile')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="phone">    @lang('site.phone') </label>
                                                    <input  value="{{ $con->phone }}" name = "phone" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('phone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fax">   @lang('site.fax')  </label>
                                                    <input  value="{{ $con->fax }}" name = "fax" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('fax')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Facebook">     @lang('site.facebook') </label>
                                                    <input  value="{{ $con->Facebook }}" name = "Facebook" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('Facebook')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="twitter">    @lang('site.twitter') </label>
                                                    <input  value="{{ $con->twitter }}" name = "twitter" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('twitter')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Youtube">   @lang('site.youtube')  </label>
                                                    <input  value="{{ $con->Youtube }}" name = "Youtube" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('Youtube')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Instagram">    @lang('site.insta') </label>
                                                    <input  value="{{ $con->Instagram }}" name = "Instagram" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('Instagram')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Google">     @lang('site.gmail') </label>
                                                    <input  value="{{ $con->Google }}" name = "Google" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('Google')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="telegram">   @lang('site.telegram')  </label>
                                                    <input  value="{{ $con->telegram }}" name = "telegram" type="text" class="@error('email') is-invalid
                                                     @enderror form-control" id="text" aria-describedby="emailHelp">
                                                    @error('telegram')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <br><br>

                                        <div class="col-12">
                                           <h2>seo</h2>
                                           <label for="keyword">@lang('site.keywords')  </label>
                                           <textarea required="required" value="{{ $con->keyword}}" name="keyword" id="" cols="30" rows="10"
                                           class="@error('description') is-invalid
                                           @enderror form-control ckeditor">{!! $con->keyword !!}</textarea>
                                           @error('keyword')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                       </div>

                                       <div class="col-12">
                                           <label for="keyword">@lang('site.optionn')  </label>
                                           <textarea required="required" value="{{ $con->optionn}}" name="optionn" id="" cols="30" rows="10"
                                           class="@error('description') is-invalid
                                           @enderror form-control ckeditor">{!! $con->optionn !!}</textarea>
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
                    <div class="modal fade" id="delete{{ $con->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        @lang('site.delete')  <b>{{ $con->name }}</b>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('contacts.destroy','test')}}"
                                          method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        @lang('site.areyou')
                                        <input id="id" type="hidden" name="con_id" class="form-control"
                                               value="{{ $con->id }}">
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

            </script>


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
@endsection
