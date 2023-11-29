@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <h6 class="text-uppercase font-weight-bold mb-3">Contact Setting</h6>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card ">

                            <form class="p-2" action="{{ route('update.contact.body') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $contact_body->id }}" name="id">
                                <div class="col-12">
                                    <label class="form-label mt-2" id="title">Contact Heading</label>
                                    <input type="text" value="{{ $contact_body->contact_heading }}" name="contact_heading" class="form-control p-4" required="required"/>
                                </div>

                                <div class="col-12">
                                    <label class="form-label mt-2 " id="title">Contact Info</label>
                                    <input type="text" value="{{ $contact_body->contact_info }}" name="contact_info" class="form-control p-4" required="required"/>
                                </div>

                                <div class="col-12">
                                    <label class="form-label mt-2" id="title">Contact Info Description</label>
                                    <div>
                                        <textarea class="form-control" name="contact_info_description" id="" rows="6" required="required">{{ $contact_body->contact_info_description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label mt-2" id="title">Office Address</label>
                                    <input type="text" value="{{ $contact_body->office_address }}" name="office_address" class="form-control p-4" required="required"/>
                                </div>

                                <div class="col-12">
                                    <label class="form-label mt-2" id="title">Email Address</label>
                                    <input type="email" value="{{ $contact_body->email_address }}" name="email_address" class="form-control p-4" required="required"/>
                                </div>

{{--                                @if ($errors->any())--}}
{{--                                    <div class="alert alert-danger">--}}
{{--                                        <ul class="alert-ul">--}}
{{--                                                <li>{{ $error }}</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

{{--                                <div class="col-12">--}}
{{--                                    <label class="form-label mt-2" id="title">Phone</label>--}}
{{--                                    <input type="text" value="{{ $contact_body->phone }}" name="phone" class="form-control p-4" required="required"/>--}}
{{--                                </div>--}}

                                <div class="col-12">
                                    <label class="form-label mt-2" id="title">Phone</label>
                                    <input type="text"
                                           value="{{ old('phone', $contact_body->phone) }}"
                                           name="phone"
                                           class="form-control p-4 {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                           required="required"/>

                                    @if ($errors->has('phone'))
                                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>

                                @if ($errors->any() && !$errors->has('phone'))
                                    <div class="alert alert-danger">
                                        <ul class="alert-ul">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <div class="col-12">
                                    <label class="form-label mt-2" id="title">ContactForm Info</label>
                                    <input type="text" value="{{ $contact_body->contact_form_info }}" name="contact_form_info" class="form-control p-4" required="required"/>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary font-weight-semi-bold mt-2 px-4" style="height: 50px;"
                                            type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection






