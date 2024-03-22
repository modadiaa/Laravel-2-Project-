@extends('layouts.admin.admin')
@section('title', __("site.message"))
@section('css')
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    </div>
    <br><br>
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>    @lang('site.name')   </th>
                <th>    @lang('site.email')   </th>
                <th>    @lang('site.subject')  </th>
                <th>    @lang('site.messages') </th>
                <th>    @lang('site.oper') </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($message as $key =>  $mess)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $mess->name ?? '' }}</td>
                        <td>{{  $mess->email ?? '' }}</td>
                        <td>{{  $mess->subject ?? '' }}</td>
                        <td>{{  $mess->message ?? '' }}</td>
                        <td>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $mess->id }}"
                                    title="Delete"><i
                                    class="fa fa-trash"></i></button>
                            {{--  @endif  --}}
                        </td>


                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit{{ $mess->id }}" tabindex="-1" role="dialog"
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
                                    <form action=""  method=""  enctype="multipart/form-data">

                                        <input type="hidden" name="mess_id" value="{{ $mess->id }}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">    @lang('site.category_section') </label>
                                                    <input required="required" value="{{ $mess->name}}" name ="name" type="text" class="@error('name') is-invalid
                                                     @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('name_ar')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">    @lang('site.category_section') </label>
                                                    <input required="required" value="{{ $mess->email}}" name ="email" type="text" class="@error('name') is-invalid
                                                     @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('name_ar')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">    @lang('site.category_section') </label>
                                                    <input required="required" value="{{ $mess->subject}}" name ="subject" type="text" class="@error('name') is-invalid
                                                     @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('name_ar')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">    @lang('site.category_section') </label>
                                                    <input required="required" value="{{ $mess->phone}}" name ="phone" type="text" class="@error('name') is-invalid
                                                     @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('name_ar')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">    @lang('site.category_section') </label>
                                                    <input required="required" value="{{ $mess->message}}" name ="message" type="text" class="@error('name') is-invalid
                                                     @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                    @error('name_ar')
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
                    <div class="modal fade" id="delete{{ $mess->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        @lang('site.delete')  <b>{{ $mess->name }}</b>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('message.destroy','test')}}"
                                          method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        @lang('site.areyou')
                                        <input id="id" type="hidden" name="mess_id" class="form-control"
                                               value="{{ $mess->id }}">
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
