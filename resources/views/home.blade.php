@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
            {{auth::user()->name}}
        </div>
        <div class="panel-body">
            You are logged in!
        </div>
    </div>
    <div class="row">
        @if(Auth::user()->role != 'expert')
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Post Statistics</div>
                    <canvas data-post="{{ $postCountData }}"
                            id="postCountData" class="panel-body">
                    </canvas>
                </div>
            </div>
        @endif
        @if(Auth::user()->role == 'admin')
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">User Statistics</div>
                    <canvas data-user="{{ $userCountData }}"
                            id="userCountData" class="panel-body">
                    </canvas>
                </div>
            </div>
        @endif
        @if(Auth::user()->role != 'trader')
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Question Statistics</div>
                    <canvas data-question="{{ $questionCountData }}"
                            data-reply="{{ $replyCountData }}"
                            id="questionCountData" class="panel-body">
                    </canvas>
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <iframe src="https://calendar.google.com/calendar/embed?src=farmersassistants%40gmail.com&ctz=Asia%2FDhaka"
                    style="border: 0" width="100%" height="320px" frameborder="0" scrolling="no">
            </iframe>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.0/moment.min.js"></script>
    <script>
        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };
        if($('#questionCountData').length > 0) {
            const questionTemp = $('#questionCountData').data('question');
            const replyTemp = $('#questionCountData').data('reply');
            const questionData = [];
            const replyData = [];
            const dayNames = [];
            for(let i = 6; i >= 0; i--) {
                const temp = moment().startOf('day').subtract(i, 'days');
                dayNames.push(temp.format('ddd'));
                const timestamp = new Date(temp).getTime();
                questionData.push(questionTemp[timestamp / 1000] || 0);
                replyData.push(replyTemp[timestamp / 1000] || 0);
            }
            new Chart(
                document.getElementById('questionCountData').getContext('2d'),
                {
                    type: 'line',
                    data: {
                        labels: dayNames,
                        datasets: [{
                            label: "Questions",
                            backgroundColor: window.chartColors.red,
                            borderColor: window.chartColors.red,
                            data: questionData,
                            fill: false,
                        }, {
                            label: "Replies",
                            fill: false,
                            backgroundColor: window.chartColors.blue,
                            borderColor: window.chartColors.blue,
                            data: replyData,
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Questions and Replies per day'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Day'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Count'
                                }
                            }]
                        }
                    }
                }
            );
        }
        if($('#postCountData').length > 0) {
            const postTemp = $('#postCountData').data('post');
            const postInterest = [];
            const postCount = [];
            for(const key in postTemp) {
                postInterest.push(key);
                postCount.push(postTemp[key]);
            }
            new Chart(
                document.getElementById('postCountData').getContext('2d'),
                {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: postCount,
                            backgroundColor: [
                                window.chartColors.green,
                                window.chartColors.blue,
                                window.chartColors.red,
                                window.chartColors.orange,
                                window.chartColors.yellow,
                            ],
                            label: 'Dataset 1'
                        }],
                        labels: postInterest
                    },
                    options: {
                        responsive: true
                    }
                }
            );
        }
        if($('#userCountData').length > 0) {
            const userTemp = $('#userCountData').data('user');
            const userRole = [];
            const userCount = [];
            for(const key in userTemp) {
                userRole.push(key);
                userCount.push(userTemp[key]);
            }
            Chart.PolarArea(
                document.getElementById('userCountData').getContext('2d'),
                {
                    data: {
                        datasets: [{
                            data: userCount,
                            backgroundColor: [
                                window.chartColors.green,
                                window.chartColors.blue,
                                window.chartColors.red,
                                window.chartColors.orange,
                                window.chartColors.yellow,
                            ],
                            label: 'My dataset'
                        }],
                        labels: userRole
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: true,
                            text: 'User Count Chart'
                        },
                        scale: {
                            ticks: {
                                beginAtZero: true
                            },
                            reverse: false
                        },
                        animation: {
                            animateRotate: false,
                            animateScale: true
                        }
                    }
                }
            );
        }
    </script>
@endsection
