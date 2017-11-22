@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        {{--<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">--}}
                            {{--<label for="first_name" class="col-md-4 control-label">First Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>--}}

                                {{--@if ($errors->has('first_name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('first_name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Mobile No.</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group row">--}}
                            {{--<label for="university_location" class="col-sm-4 col-form-label">Location</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<select class="form-control" id="university_location" name="university_location">--}}
                                    {{--<option value="">Select Location</option>--}}
                                    {{--<option value="">Dhaka</option>--}}
                                    {{--<option value="Barisal">Barisal</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label for="role" class="col-md-4 control-label">Role</label>

                        <div class="col-md-6">
                                <div class="dropdown">
                                    <select class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" name="role">
                                        <option value="farmer">কৃষক</option>
                                        <option value="trader">ব্যবসায়ী</option>
                                    </select>
                                </div>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">--}}
                            {{--<label for="interests" class="col-md-4 control-label">Interests</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<div class="dropdown">--}}

                                    {{--<select name="interests[]" id="multiple-checkboxes" multiple="multiple">--}}
                                        {{--<option value="paddy">Paddy</option>--}}
                                        {{--<option value="wheat">Wheat</option>--}}
                                        {{--<option value="onion">Onion</option>--}}
                                        {{--<option value="garlic">Garlic</option>--}}
                                        {{--<option value="ginger">Ginger</option>--}}
                                        {{--<option value="mustard">Mustard</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                                {{--@if ($errors->has('interests'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('interests') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                        {{--</div>--}}




                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-2">{{ Form::label('mobile_no', 'Mobile No.') }}</div>--}}
                                {{--<div class="col-md-10">{{ Form::text('mobile_no', null, ['class' => 'form-control', 'required']) }}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-md-2">{{ Form::label('role', 'Role') }}</div>--}}
                        {{--<div class="col-md-10">{{ Form::select('role', $roles, null, ['class' => 'form-control', 'required', 'id' => 'role_id', 'placeholder' => 'Select Role']) }}--}}
                        {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        {{--<div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">--}}
                            {{--<label for="role">Role</label>--}}
                            {{--<select id="role" name="role" class="form-control" required>--}}
                                {{--<option value="">Farmer</option>--}}
                                {{--<option value="">Trader</option>--}}
                                {{--@foreach ($role as $key => $value)--}}
                                    {{--<option value="{{ $key }}" {{ old('role') == $key ? 'selected' : ''}}>{{ $value }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                            {{--@if ($errors->has('role'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('role') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


{{--@section('script')--}}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$('#interests').multiselect({--}}
                {{--enableFiltering: true,--}}
                {{--enableCaseInsensitiveFiltering: true,--}}
                {{--buttonWidth:'400px'--}}
            {{--});--}}

{{--//            $('#interests_form').on('submit', function(event){--}}
{{--//                event.preventDefault();--}}
{{--//                var form_data = $(this).serialize();--}}
{{--//                $.ajax({--}}
{{--//                    url:"User.php",--}}
{{--//                    method:"POST",--}}
{{--//                    data:form_data,--}}
{{--//                    success:function(data)--}}
{{--//                    {--}}
{{--//                        $('#interests option:selected').each(function(){--}}
{{--//                            $(this).prop('selected', false);--}}
{{--//                        });--}}
{{--//                        $('#interests').multiselect('refresh');--}}
{{--//                        alert(data);--}}
{{--//                    }--}}
{{--//                });--}}
{{--//            });--}}


        {{--});--}}
    {{--</script>--}}

{{--@endsection--}}
