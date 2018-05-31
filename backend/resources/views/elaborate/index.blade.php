@extends('layouts.app')
@section('content')

 
<section id="minimal-statistics">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>{{ $surveyTitle }}</h4>
            <p>Statistics on the survey</p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-pencil cyan font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body text-xs-right">
                                <h3>{{ $totalResponse }}</h3>
                                <span>Total Number of Responses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-chat1 deep-orange font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body text-xs-right">
                                <h3>{{ $completed }}</h3>
                                <span>Responses saved</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-trending_up teal font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body text-xs-right">
                                <h3>{{ $reviewed }}</h3>
                                <span>Responses reviewed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-map1 pink font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body text-xs-right">
                                <h3>423</h3>
                                <span>Total Visits</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>Responses By Each Monitor.</h4>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 1'] }}</h3>
                                <span>Monitor 1</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 2'] }}</h3>
                                <span>Monitor 2</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 3'] }}</h3>
                                <span>Monitor 3</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 4'] }}</h3>
                                <span>Monitor 4</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 5'] }}</h3>
                                <span>Monitor 5</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 6'] }}</h3>
                                <span>Monitor 6</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 7'] }}</h3>
                                <span>Monitor 7</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 8'] }}</h3>
                                <span>Monitor 8</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 9'] }}</h3>
                                <span>Monitor 9</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors['Monitor 10'] }}</h3>
                                <span>Monitor 10</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="cyan">278</h3>
                                <span>New Posts</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-pencil cyan font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                        <progress class="progress progress-sm progress-cyan mt-1 mb-0" value="80" max="100"></progress>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="deep-orange">156</h3>
                                <span>New Comments</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-chat1 deep-orange font-large-2 float-xs-right"></i>
                            </div>
                            <progress class="progress progress-sm progress-deep-orange mt-1 mb-0" value="35" max="100"></progress>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="teal">64.89 %</h3>
                                <span>Bounce Rate</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-trending_up teal font-large-2 float-xs-right"></i>
                            </div>
                            <progress class="progress progress-sm progress-teal mt-1 mb-0" value="60" max="100"></progress>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">423</h3>
                                <span>Total Visits</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-map1 pink font-large-2 float-xs-right"></i>
                            </div>
                            <progress class="progress progress-sm progress-pink mt-1 mb-0" value="40" max="100"></progress>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Minimal statistics section end -->

<!-- Minimal statistics with bg color section start -->
<section id="minimal-statistics-bg">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>Minimal Statistics With Background Color</h4>
            <p>Statistics on minimal cards with background color.</p>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-cyan">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-pencil white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>278</h3>
                                <span>New Posts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-deep-orange">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-chat1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>156</h3>
                                <span>New Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-teal">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-trending_up white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>64.89 %</h3>
                                <span>Bounce Rate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-pink">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-map1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>423</h3>
                                <span>Total Visits</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-pink">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body white text-xs-left">
                                <h3>278</h3>
                                <span>New Projects</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 white font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-teal">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body white text-xs-left">
                                <h3>156</h3>
                                <span>New Clients</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user1 white font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-deep-orange">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body white text-xs-left">
                                <h3>64.89 %</h3>
                                <span>Conversion Rate</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-diagram white font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-cyan">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body white text-xs-left">
                                <h3>423</h3>
                                <span>Support Tickets</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-ios-help-outline white font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    @endsection