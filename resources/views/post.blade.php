@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="page-header">Post Section</h2>

                <div>
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                                <header class="text-left">
                                    <div class="comment-user"><i class="fa fa-user"></i> {{Auth::user()->name}}</div>
                                    <time class="comment-date"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::now('Asia/Dhaka')->toDateString() }}</time><br>
                                    <time class="comment-date"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::now('Asia/Dhaka')->toTimeString() }}</time>
                                </header>
                                <form class="form-horizontal" method="POST" action="{{ url('/home/post') }}">
                                    <div class="comment-post">
                                        {{csrf_field()}}

                                        <span class="btn-group">
                                             <br>

                                            <div>

                                                <label for="product" class="control-label">Product:</label>
                                                <br>
                                                <select type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-bottom: 10px;margin-top: 10px;" class="dropdown-menu" name="product" role="menu">
                                                    @foreach(Auth::user()->interests as $item)
                                                        <option value="{{$item->id}}">{{$item->interest}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label for="amount" class="control-label">Amount(Kg):</label>
                                                <br>
                                                <select type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-bottom: 10px" class="dropdown-menu" name="amount" role="menu">
                                                    <option>5</option>
                                                    <option>10</option>
                                                </select>
                                            </div>


                                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}" style="margin-left: 0px">

                                                    <label for="amount" class="control-label">Price Per Unit(Tk):</label>
                                                    <input id="price" placeholder="Price Per Unit (Tk)" type="price" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                                    @if ($errors->has('price'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('price') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>


                                        </span>

                                        <p class="text-right"><button class="btn btn-default" type="submit"> post</button></p>
                                    </div>

                                </form>
                            </div>

                    </div>

                    </div>

                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection