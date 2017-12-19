@extends('layouts.app')

@section('content')

    @foreach($posts as $post)
        <div class="form-horizontal" class="row" style="margin: auto; width: 75%;" >

            <div class="col-md-12">
                <div class="comment-main-level">

                    <div class="comment-box" >
                        <div class="comment-head">
                            <h6 class="comment-name">
                                <a href="">{{$post->user->name}}</a>
                                <div class="tag-span">
                                    {{ $post->user->role }}
                                </div>
                            </h6>
                            <span>{{$post->updated_at->diffForHumans()}}</span>
                        </div>
                        <div class="comment-content">
                            @if($post->is_expired)
                                <img src="/assets/img/expired.jpg" alt="expired" style="float: right; width: 90px;">
                            @endif
                            I want to {{ $post->user->role == 'farmer' ? 'sell' : 'buy' }} <b>{{$post->amount}}</b> kg of <b>{{$post->interest->interest}}</b> for <b>{{$post->price}}</b> taka per kg.
                            <br><br>
                            Contact with me in below listed contacts if you want to.
                            <hr>
                            <div>
                                Email: {{$post->user->email}}
                            </div>
                            <div>
                                Mobile No: {{$post->user->phone}}
                            </div>
                            <br>
                            @if($post->user->id == Auth::user()->id)
                                <div style="margin-right: 20px">
                                    @if(!$post->is_expired)
                                        <button type="button" class="btn btn-success"
                                            data-toggle="modal" data-target="#myModal"
                                            data-field-id="{{ $post->id }}"
                                            data-interest-id="{{ $post->interest_id }}"
                                            data-amount="{{ $post->amount }}"
                                            data-price="{{ $post->price }}"
                                            onclick="editPost(this)">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-primary"
                                            data-field-id="{{ $post->id }}"
                                            onclick="setExpire(this)">
                                            Expire
                                        </button>
                                    @endif
                                    <button type="button" class="btn btn-danger"
                                        onclick="deletePost(this)"
                                        data-field-id="{{ $post->id }}">
                                        Delete
                                    </button>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="modal_header" class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('/home/post') }}">
                        <div class="comment-post">
                            {{csrf_field()}}

                            <span class="btn-group">
                                 <br>

                                <div>

                                    <label for="product" class="control-label">Product:</label>
                                    <br>
                                    <select disabled id="interest_id" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-bottom: 10px;margin-top: 10px;" class="dropdown-menu" name="product" role="menu">
                                        @foreach(Auth::user()->interests as $item)
                                            <option value="{{$item->id}}">{{$item->interest}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="amount" class="control-label">Amount(Kg):</label>
                                    <br>
                                    <select id="amount" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-bottom: 10px" class="dropdown-menu" name="amount" role="menu">
                                        <option>5</option>
                                        <option>10</option>
                                    </select>
                                </div>


                                <div class="form-group" style="margin-left: 0px">

                                        <label for="amount" class="control-label">Price Per Unit(Tk):</label>
                                        <input id="price" placeholder="Price Per Unit (Tk)" type="price" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                </div>
                            </span>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button onclick="save()" type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        a {
            color: #03658c;
            text-decoration: none;
        }

        ul {
            list-style-type: none;
        }

        body {
            font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
            background: #dee1e3;
        }

        /** ====================
        * Lista de Comentarios
        =======================*/
        .comments-container {
            margin: 60px auto 15px;
            width: 768px;
        }

        .comments-container h1 {
            font-size: 36px;
            color: #283035;
            font-weight: 400;
        }

        .comments-container h1 a {
            font-size: 18px;
            font-weight: 700;
        }

        .comments-list {
            margin-top: 30px;
            position: relative;
        }

        /**
        * Lineas / Detalles
        -----------------------*/
        .comments-list:before {
            content: '';
            width: 2px;
            height: 100%;
            background: #c7cacb;
            position: absolute;
            left: 32px;
            top: 0;
        }

        .comments-list:after {
            content: '';
            position: absolute;
            background: #c7cacb;
            bottom: 0;
            left: 27px;
            width: 7px;
            height: 7px;
            border: 3px solid #dee1e3;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .reply-list:before, .reply-list:after {display: none;}
        .reply-list li:before {
            content: '';
            width: 60px;
            height: 2px;
            background: #c7cacb;
            position: absolute;
            top: 25px;
            left: -55px;
        }


        .comments-list li {
            margin-bottom: 15px;
            display: block;
            position: relative;
        }

        .comments-list li:after {
            content: '';
            display: block;
            clear: both;
            height: 0;
            width: 0;
        }

        .reply-list {
            padding-left: 88px;
            clear: both;
            margin-top: 15px;
        }
        /**
        * Avatar
        ---------------------------*/
        .comments-list .comment-avatar {
            width: 65px;
            height: 65px;
            position: relative;
            z-index: 99;
            float: left;
            border: 3px solid #FFF;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .comments-list .comment-avatar img {
            width: 100%;
            height: 100%;
        }

        .reply-list .comment-avatar {
            width: 50px;
            height: 50px;
        }

        .comment-main-level:after {
            margin-bottom: 20px;
            content: '';
            width: 0;
            height: 0;
            display: block;
            clear: both;
        }
        /**
        * Caja del Comentario
        ---------------------------*/
        .comments-list .comment-box {
            width: 680px;
            float: right;
            position: relative;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
            -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
            box-shadow: 0 1px 1px rgba(0,0,0,0.15);
        }

        .comments-list .comment-box:before, .comments-list .comment-box:after {
            content: '';
            height: 0;
            width: 0;
            position: absolute;
            display: block;
            border-width: 10px 12px 10px 0;
            border-style: solid;
            border-color: transparent #FCFCFC;
            top: 8px;
            left: -11px;
        }

        .comments-list .comment-box:before {
            border-width: 11px 13px 11px 0;
            border-color: transparent rgba(0,0,0,0.05);
            left: -12px;
        }

        .reply-list .comment-box {
            width: 610px;
        }
        .comment-box .comment-head {
            background: #FCFCFC;
            padding: 10px 12px;
            border-bottom: 1px solid #E5E5E5;
            overflow: hidden;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
        }

        .comment-box .comment-head i {
            float: right;
            margin-left: 14px;
            position: relative;
            top: 2px;
            color: #A6A6A6;
            cursor: pointer;
            -webkit-transition: color 0.3s ease;
            -o-transition: color 0.3s ease;
            transition: color 0.3s ease;
        }

        .comment-box .comment-head i:hover {
            color: #03658c;
        }

        .comment-box .comment-name {
            color: #283035;
            font-size: 14px;
            font-weight: 700;
            float: left;
            margin-right: 10px;
        }

        .comment-box .comment-name a {
            color: #283035;
        }

        .comment-box .comment-head span {
            float: left;
            color: #999;
            font-size: 13px;
            position: relative;
            top: 1px;
        }

        .comment-box .comment-content {
            background: #FFF;
            padding: 12px;
            font-size: 15px;
            color: #595959;
            -webkit-border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            border-radius: 0 0 4px 4px;
        }

        .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
        .comment-box .comment-name.by-author:after {
            content: 'Farmer';
            background: #03658c;
            color: #FFF;
            font-size: 12px;
            padding: 3px 5px;
            font-weight: 700;
            margin-left: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .tag-span{
            background: #03658c;
            color: #FFF;
            font-size: 12px;
            padding: 3px 5px;
            font-weight: 700;
            margin-left: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            display: inline;
        }

        .comment-box .comment-name.by-replier, .comment-box .comment-name.by-replier a {color: #03658c;}
        .comment-box .comment-name.by-replier:after {
            content: 'Trader';
            background: #03658c;
            color: #FFF;
            font-size: 12px;
            padding: 3px 5px;
            font-weight: 700;
            margin-left: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }


        /** =====================
        * Responsive
        ========================*/
        @media only screen and (max-width: 766px) {
            .comments-container {
                width: 480px;
            }

            .comments-list .comment-box {
                width: 390px;
            }

            .reply-list .comment-box {
                width: 320px;
            }
        }
    </style>

@endsection()

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let edit_id = null;
        function setExpire(button) {
            if(!confirm("Are you sure to expire?")) return;
            const id = $(button).data('field-id');
            $.ajax({
                type: "PUT",
                url: '{{ route('setExpire') }}',
                data: {
                    id: id
                },
                success: (data) => {
                    BootstrapDialog.show({
                        title: 'Success!',
                        message: 'Your post has been expired.',
                        buttons: [{
                            label: 'Close',
                            action: function(dialog) {
                                dialog.close();
                                location.reload();
                            }
                        }]
                    });
                }
            });
        }
        function editPost(button) {
            edit_id = $(button).data('field-id');
            $('#interest_id').val($(button).data('interest-id'));
            $('#amount').val($(button).data('amount'));
            $('#price').val($(button).data('price'));
        }
        function save(){
            const interest_id = $('#interest_id').val();
            const amount = $('#amount').val();
            const price = $('#price').val();
            $.ajax({
                type: "PUT",
                url: '{{ route('postUpdate') }}',
                data: {
                    id: edit_id,
                    interest_id: interest_id,
                    amount: amount,
                    price: price
                },
                success: (data) => {
                    BootstrapDialog.show({
                        title: 'Success!',
                        message: 'Your post has been successfully updated.',
                        buttons: [{
                            label: 'Close',
                            action: function(dialog) {
                                dialog.close();
                                location.reload();
                            }
                        }]
                    });
                }
            });
        }
        function deletePost(button){
            if(!confirm("Are you sure to delete?")) return;
            const id = $(button).data('field-id');
            $.ajax({
                type: "DELETE",
                url: '{{ route('postDelete') }}',
                data: {
                    id: id
                },
                success: (data) => {
                    BootstrapDialog.show({
                        title: 'Success!',
                        message: 'Your post has been successfully deleted.',
                        buttons: [{
                            label: 'Close',
                            action: function(dialog) {
                                dialog.close();
                                location.reload();
                            }
                        }]
                    });
                }
            });
        }
    </script>
@endsection