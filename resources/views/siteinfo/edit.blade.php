@extends('include.header')


@section('content')
    <form action="{{ route('siteinfo.update', $siteinfo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="container">
            <div class="row">
                    <!-- for error messages-->
                    @if(count($errors)>0)
                        <ul class="navbar-nav mr-auto">
                        @foreach ($errors->all() as $error)
                            <li class="nav-item active">
                                {{$error}}
                            </li>
                        @endforeach
                        </ul>
                        <hr/>
                    @endif
                   <!--end error-->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Edit Site Settings Form</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="site_name">Site Name <span class="required text-danger small">*</span></label>
                                        <input type="text" name="site_name"  class="form-control" value="{{ old('site_name', $siteinfo->site_name) }}" placeholder="Site Name" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $siteinfo->phone_number) }}" placeholder="Phone Number" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ old('email', $siteinfo->email) }}" placeholder="Email" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ old('address', $siteinfo->address) }}" placeholder="Address" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="description">Paypal Donation Account</label>
                                        <input type="text" name="paypal" class="form-control" value="{{ old('paypal', $siteinfo->paypal) }}" placeholder="Paypal Donation Account" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="desc">Description</label>
                                        <textarea name="desc"class="form-control" rows="5"  required>
                                   {{ old('desc=', $siteinfo->desc) }}
                                        </textarea>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="text-right">
                        <a href="{{ route('siteinfo.index', $siteinfo) }}" class="btn btn-secondary"><em class="fa fa-times"></em> Cancel</a>
                        <button class="btn btn-primary" type="submit"><em class="fa fa-save"></em> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection