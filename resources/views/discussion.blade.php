@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <!-- Contenedor Principal -->

            <div class="comments-container">
                <h1>Discussion Section</h1>
                <hr>

                @if(Auth::user()->role == 'farmer')
                    <form class="form-horizontal" method="POST" action="{{ route('storeQuestion')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <label for="question">Ask Question</label>
                                <textarea class="form-control" rows="5" id="question" name="question" class="form-control" placeholder="Ask your question" value="{{ old('question') }}" required autofocus></textarea>

                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                @endif

                @foreach($questions as $question)
                    <ul id="comments-list" class="comments-list">
                        <li>
                            <div class="comment-main-level">

                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name by-author"><a href="">{{$question->user->name}}</a></h6>
                                        <span>{{$question->created_at->diffForHumans()}}</span>
                                    </div>
                                    <div class="comment-content">
                                        {{$question->question}}
                                        <br>
                                        <div class="form-group">
                                            @if(Auth::user()->id == $question->user_id)
                                                <button type="submit" class="btn btn-primary" style="float: right;"
                                                        data-toggle="modal" data-target="#myModal"
                                                        data-field-id="{{ $question->id }}"
                                                        data-field-val="{{ $question->question }}"
                                                        onclick="editQuestion(this)">
                                                    <span>Edit</span>
                                                </button>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul id="comments-list" class="comments-list">
                        <li>
                            <form class="form-horizontal" method="POST" action="{{ route('storeReply', $question->id)  }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('reply') ? ' has-error' : '' }}">

                                    <div class="col-md-9" style="margin-left: 85px">
                                        <input type="text" class="form-control" id="reply" name="reply" class="form-control" placeholder="Reply the question" value="{{ old('reply') }}" required autofocus></input>

                                        @if ($errors->has('reply'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('reply') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group" style="margin-left: 680px;position: relative;bottom: 51px">
                                    <div >
                                        <button type="submit" class="btn btn-primary">
                                            Post
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </li>
                    </ul>
                    @foreach($question->reply as $reply)
                        <ul class="comments-list reply-list">
                            <li>
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name by-replier"><a href="">{{ $reply->user->name  }}</a></h6>
                                        <span>{{$reply->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="comment-content">
                                        {{ $reply->reply }}
                                        <br>
                                        @if(Auth::user()->id == $reply->user_id)
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" style="float: right; display: block"
                                                        data-toggle="modal" data-target="#myModal"
                                                        data-field-id="{{ $reply->id }}"
                                                        data-field-val="{{ $reply->reply }}"
                                                        onclick="editReply(this)">
                                                    <span>Edit</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                @endforeach
            </div>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 id="modal_header" class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <textarea id="modal_body" style="width: 100%;"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button onclick="save()" type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
    /**
    * Oscuro: #283035
    * Azul: #03658c
    * Detalle: #c7cacb
    * Fondo: #dee1e3
    ----------------------------------*/
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
    padding-bottom: 30px;
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

    .comment-box .comment-name.by-replier, .comment-box .comment-name.by-replier a {color: #03658c;}
    .comment-box .comment-name.by-replier:after {
        content: 'Expert';
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
        let editing = 'question', id = null;
        function editQuestion(button) {
            editing = 'question';
            $('#modal_header').html("Edit Question");
            id = $(button).data('field-id');
            const question = $(button).data('field-val');
            $('#modal_body').text(question);
        }
        function editReply(button) {
            editing = 'reply';
            $('#modal_header').html("Edit Reply");
            id = $(button).data('field-id');
            const reply = $(button).data('field-val');
            $('#modal_body').text(reply);
        }
        function save() {
            const val = $('#modal_body').val();
            $.ajax({
                type: "PUT",
                url: '{{ route('updateQuestion') }}',
                data: {
                    id: id,
                    val: val,
                    editing: editing
                },
                success: (data) => {
                    BootstrapDialog.show({
                        title: 'Success!',
                        message: 'Your ' + editing + ' has been successfully updated.',
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