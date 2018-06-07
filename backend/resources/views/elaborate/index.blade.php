@extends('layouts.app')
@section('content')

<style>
.headgo{
    display:flex;
    justify-content: space-between;
}
</style>
 
<section id="minimal-statistics">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3 headgo ">
            <div>
                <h4>{{ $surveyTitle }}</h4>
                <p>Statistics</p>
                <hr>
            </div>
            <div>
                <i>
                   <a href="/download/administrative/{{$surveyId}}">Download CSV/XLS File</a>
                </i>
            </div>
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
                                <i class="icon-chat2 font-large-2 float-xs-left"></i>
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
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-chat4 pink font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body text-xs-right">
                                <h3>{{ $incomplete }}</h3>
                                <span>Incomplete Survey</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>Responses By Each Monitor.</h4>
            <p>For survey {{ $surveyTitle }}</p>
            <hr>
        </div>
    </div>

    <div class="row">
        @foreach($monitors as $index => $monitor )
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{ $monitors[$index] }}</h3>
                                <span>{{ $index }}</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user4 {{ $loop->iteration%2==0 ? 'pink' : 'black' }} font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">    
        <canvas id="bar-chart-monitors" class="charts" width="800" height="350"></canvas>
    </div>
</section>


<section id="minimal-statistics-bg">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>Sources by gender</h4>
            <p>Proportion of Female, Male, Transgender of total sources.</p>
            <hr>
        </div>
    </div>

    <div class="row">
        @foreach($genderSources as $index => $genderSource )
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-deep-orange">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-user1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>{{ $index }}</h3>
                                <span>{{ $genderSource }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-6">
            <canvas id="bar-chart-genderSources" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="bar-chart-genderSourcesValue" class="charts" width="800" height="350"></canvas>
        </div> 

        <div class="col-lg-6">
            <canvas id="pie-chart-genderSources" class="charts" width="800" height="350"></canvas>
        </div> 
        <div class="col-lg-6">
            <canvas id="pie-chart-genderSourcesValue" class="charts" width="800" height="350"></canvas>
        </div> 
    </div>
    
</section>


<section id="minimal-statistics-bg">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>People in images</h4>
            <p>Proportion of Female, Male, Transgender of total people in images.</p>
            <hr>
        </div>
    </div>


    <div class="row">
        @foreach($imageSources as $index => $imageSource )
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-blue">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-user1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>{{ $index }}</h3>
                                <span>{{ $imageSource }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-6">
            <canvas id="bar-chart-imageSources" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="bar-chart-imageSourcesValue" class="charts" width="800" height="350"></canvas> 
        </div>
        <div class="col-lg-6">
            <canvas id="pie-chart-imageSources" class="charts" width="800" height="350"></canvas> 
        </div>
        <div class="col-lg-6">
            <canvas id="pie-chart-imageSourcesValue" class="charts" width="800" height="350"></canvas> 
        </div>
    </div>
</section>



<section id="minimal-statistics-bg">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>Stories that are gender aware</h4>
            <p>Proportion of total number of stories .</p>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-blue">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-user1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>Gender aware Stories </h3>
                                <span>{{ $genderAware['yes'] }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-blue">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-user1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>Not Gender aware Stories </h3>
                                <span>{{ $genderAware['no'] }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <canvas id="genderAware" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="genderAwareValue" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="piegenderAware" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="piegenderAwareValue" class="charts" width="800" height="350"></canvas>
        </div>
    </div>
</section>




<section id="minimal-statistics-bg">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>Number of stories for further analysis</h4>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-blue">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-user1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3># </h3>
                                <span>{{ $furtherAnalysis['yes'] }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="minimal-statistics-bg">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>Reporters by gender</h4>
            <p>Female, Male, Transgender proportion of total reporters.</p>
            <hr>
        </div>
    </div>
    
    <div class="row">
        @foreach($reporterProportion as $index => $reporter )
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-pink">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-user1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>{{ $index }}</h3>
                                <span>{{ $reporter }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-6">
            <canvas id="reporterProportion" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="reporterProportionValue" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="pieReporterProportion" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="pieReporterProportionValue" class="charts" width="800" height="350"></canvas>
        </div>
    </div>
</section>


<section id="minimal-statistics-bg">
    <div class="row">
        <div class="col-xs-12 mt-1 mb-3">
            <h4>Presenters by gender</h4>
            <p>Female, Male, Transgender proportion of total reporters.</p>
            <hr>
        </div>
    </div>

    <div class="row">
        @foreach($presenterProportion as $index => $presenter )
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-grey">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-user1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>{{ $index }}</h3>
                                <span>{{ $presenter }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-6">
            <canvas id="presenterProportion" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">        
            <canvas id="presenterProportionValue" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">
            <canvas id="piePresenterProportion" class="charts" width="800" height="350"></canvas>
        </div>
        <div class="col-lg-6">        
            <canvas id="piePresenterProportionValue" class="charts" width="800" height="350"></canvas>
        </div>
    </div>
</section>


<!-- Vertical Tabs start -->
<!-- <section id="vertical-tabs">
	<div class="row">
		<div class="col-xs-12 mt-1">
			<h4>Vertical Tabs</h4>
			<hr>
		</div>
	</div>
	<div class="row match-height">
		<div class="col-xl-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Vertical Left Tabs</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
						<p>Wrap tabs and tab content with <code>.nav-vertical</code> class. To add left navigation use <code>.nav-left</code> class to <code>.nav.nav-tabs</code>.</p>
						<div class="nav-vertical">
							<ul class="nav nav-tabs nav-left">
								<li class="nav-item">
									<a class="nav-link active" id="baseVerticalLeft-tab1" data-toggle="tab" aria-controls="tabVerticalLeft1" href="#tabVerticalLeft1" aria-expanded="true">Tab 1</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tabVerticalLeft2" href="#tabVerticalLeft2" aria-expanded="false">Tab 2</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="baseVerticalLeft-tab3" data-toggle="tab" aria-controls="tabVerticalLeft3" href="#tabVerticalLeft3" aria-expanded="false">Tab 3 </a>
								</li>
							</ul>
							<div class="tab-content px-1">
								<div role="tabpanel" class="tab-pane active" id="tabVerticalLeft1" aria-expanded="true" aria-labelledby="baseVerticalLeft-tab1">
									<p>Oat cake marzipan cake lollipop caramels wafer pie jelly beans. Icing halvah chocolate cake carrot cake. Jelly beans carrot cake marshmallow gingerbread chocolate cake. Gummies cupcake croissant.</p>
								</div>
								<div class="tab-pane" id="tabVerticalLeft2" aria-labelledby="baseVerticalLeft-tab2">
									<p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie pastry cotton candy oat cake fruitcake jelly chupa chups. Pudding caramels pastry powder cake soufflé wafer caramels. Jelly-o pie cupcake.</p>
								</div>
								<div class="tab-pane" id="tabVerticalLeft3" aria-labelledby="baseVerticalLeft-tab3">
									<p>Biscuit ice cream halvah candy canes bear claw ice cream cake chocolate bar donut. Toffee cotton candy liquorice. Oat cake lemon drops gingerbread dessert caramels. Sweet dessert jujubes powder sweet sesame snaps.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section> -->
<!-- Vertical Tabs end -->

    </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        window.monitors = '<?= json_encode($monitors) ?>';
        window.genderSources = '<?= json_encode($genderSources) ?>';
        window.imageSources = '<?= json_encode($imageSources) ?>';
        window.reporterProportion = '<?= json_encode($reporterProportion) ?>';
        window.presenterProportion = '<?= json_encode($presenterProportion) ?>';
        window.genderAwareYes = '<?= $genderAware["yes"] ?>';
        window.genderAwareNo = '<?= $genderAware["no"] ?>';
    </script>
@endsection