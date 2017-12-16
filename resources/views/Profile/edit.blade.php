@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/home/profile/edit') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Mobile No.</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            @if(Auth::user()->role == 'farmer' || Auth::user()->role == 'trader')
                                <div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">
                                    <label for="interests" class="col-md-4 control-label">Interests</label>

                                    <div class="col-md-6">
                                        <div class="dropdown">

                                            <select name="interests[]" id="multiple-checkboxes" multiple="multiple">

                                                @foreach(\App\Interest::all() as $item)
                                                    @if(in_array($item->interest, $user_interests))
                                                        <option value="{{$item->id}}" selected>{{$item->interest}}</option>
                                                    @else
                                                        <option value="{{$item->id}}">{{$item->interest}}</option>
                                                    @endif
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>

                                    @if ($errors->has('interests'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('interests') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            @endif

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#multiple-checkboxes').multiselect();
        });
    </script>
@endsection
