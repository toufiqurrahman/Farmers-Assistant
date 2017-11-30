@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Delete Interests</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/home/delete_interest') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('interest') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">Interest</label>

                                <div class="col-md-6">
                                    <div class="dropdown">
                                        <select class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" name="interest">
                                            @foreach(\App\Interest::all() as $item)
                                                <option value="{{$item->id}}">{{$item->interest}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('interest'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('interest') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-danger">
                                        Delete Interest
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