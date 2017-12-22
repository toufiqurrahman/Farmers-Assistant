
@extends('layouts.app')

@section('content')

    <div id='container' class="container">
        @if(Auth::user()->role == 'farmer')
            <h4>Available Experts</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Expert Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($experts as $expert)
                    <tr>
                        <td>{{ $expert->user->name }}</td>
                        <td>
                            <button class="btn btn-success" data-id="{{ $expert->user->id }}"
                                    onclick="callExpert(this)">
                                Request Connection
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @elseif(Auth::user()->role == 'expert')
            <div id='expert'></div>
        @endif
        <iframe width="540" height="400" class='embed' id='iframe'
                src="https://www.gruveo.com/embed/"
                frameborder="0" allowfullscreen>
        </iframe>
    </div>

@endsection()

@section('script')
    <script>

        var pastCode = null;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function callExpert(button) {
            const expert_id = $(button).data('id');
            $.ajax({
                type: "GET",
                url: '/public/home/gruveo/' + expert_id,
                success: (gruveoKey) => {
                    document.getElementById('iframe').setAttribute('src', 'https://www.gruveo.com/embed/?code=' + gruveoKey);
                }
            });
        }

        function call(refresh = false) {
            $.ajax({
                type: "GET",
                url: '/public/home/gruveo',
                success: (gruveoKey) => {
                    if(gruveoKey != pastCode) {
                        document.getElementById('iframe').setAttribute('src', 'https://www.gruveo.com/embed/?code=' + gruveoKey);
                        pastCode = gruveoKey;
                        if(refresh) alert('Someone wants to connect with you');
                    }
                }
            });
        }

        var tag = document.createElement("script");
        tag.src = "https://www.gruveo.com/embed-api/";
        var firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // This function gets called after the API code downloads. It creates
        // the actual Gruveo embed and passes parameters to it.
        function onGruveoEmbedAPIReady() {
            if($('#expert').length == 1)
                call();
            setInterval(function(){call(true)}, 30000);
        }

    </script>

@endsection

@section('css')
    <style>
        .container{
            align-content: center;
        }
    </style>
@endsection
