
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">Real Time Communication</h2>


                <!-- The Gruveo embed's <iframe> will replace this <div> tag. -->
                <div class="row">
                    <div class="container" id="video-call" style="margin-bottom: 80px">
                        <iframe width="680" height="465"
                              src="https://www.gruveo.com/embed/?code={{Auth::user()->name}}"
                              frameborder="0" allowfullscreen>

                        </iframe>
                    </div>
              </div>

            </div>
        </div>
    </div>

@endsection()

@section('script')
    <script>
        // This code loads the Gruveo Embed API code asynchronously.
        var tag = document.createElement("script");
        tag.src = "https://www.gruveo.com/embed-api/";
        var firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // This function gets called after the API code downloads. It creates
        // the actual Gruveo embed and passes parameters to it.
        var embed;
        function onGruveoEmbedAPIReady() {
            embed = new Gruveo.Embed("myembed", {
                responsive: 1,
                embedParams: {
                    code: "{{Auth::user()->name}}"
                }
            });
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
