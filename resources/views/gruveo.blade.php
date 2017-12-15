
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">Real Time Communication</h2>


                <div class="row">
                    <div>
                        <button class="btn btn-success" id="call-btn" style="margin-bottom: 10px">Call</button>
                    </div>
                    <div id="myembed"></div>

              </div>

            </div>
        </div>
    </div>

@endsection()

@section('script')
    <script>
        // This code loads the Gruveo Embed API code asynchronously.
        {{--var tag = document.createElement("script");--}}
        {{--tag.src = "https://www.gruveo.com/embed-api/";--}}
        {{--var firstScriptTag = document.getElementsByTagName("script")[0];--}}
        {{--firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);--}}

        {{--// This function gets called after the API code downloads. It creates--}}
        {{--// the actual Gruveo embed and passes parameters to it.--}}
        {{--var embed;--}}
        {{--function onGruveoEmbedAPIReady() {--}}
            {{--embed = new Gruveo.Embed("myembed", {--}}
                {{--responsive: 1,--}}
                {{--embedParams: {--}}
                    {{--code: "{{Auth::user()->name}}"--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}

        var clientId = "demo";

        var tag = document.createElement("script");
        tag.src = "https://www.gruveo.com/embed-api/";
        var firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var embed;
        function onGruveoEmbedAPIReady() {
            <?php
                $secret = 'W62wB9JjW3tFyUMtF5QhRSbk';
                $generated = time();
                $hmac = hash_hmac('sha256', (string)$generated, $secret, TRUE);
                $signature = base64_encode($hmac);
            ?>

            embed = new Gruveo.Embed("myembed", {
                width: 1150,
                height: 465,
                embedParams: {
                    clientid: clientId,
                    color: "63b2de",
                    branding: 0
                }
            });

            embed
                .on("error", onEmbedError)
                .on("requestToSignApiAuthToken", onEmbedRequestToSignApiAuthToken)
                .on("ready", onEmbedReady);
        }

        function onEmbedError(e) {
            console.error("Received error " + e.error + ".");
        }

        function onEmbedRequestToSignApiAuthToken(e) {
            var tokenHmac;
            // ...
            // Compute the HMAC of e.token. Do it server-side only so you don't
            // expose your API secret in the client code!
            // ...
            embed.authorize(tokenHmac);
        }

        function omEmbedReady(e){
            document.getElementById('call-btn').addEventListener("click", function(){
                embed.call('Expert', true);
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
