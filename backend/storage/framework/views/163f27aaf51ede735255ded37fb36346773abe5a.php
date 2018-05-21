<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">278</h3>
                            <span>New Projects</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
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
                            <h3 class="teal">156</h3>
                            <span>New Clients</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-user1 teal font-large-2 float-xs-right"></i>
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
                            <h3 class="deep-orange">64.89 %</h3>
                            <span>Conversion Rate</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
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
                            <h3 class="cyan">423</h3>
                            <span>Support Tickets</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ios-help-outline cyan font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ stats -->
<!--/ project charts -->
<div class="row">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-inline text-xs-center pt-2 m-0">
                    <li class="mr-1">
                        <h6><i class="icon-circle warning"></i> <span class="grey darken-1">Remaining</span></h6>
                    </li>
                    <li class="mr-1">
                        <h6><i class="icon-circle success"></i> <span class="grey darken-1">Completed</span></h6>
                    </li>
                </ul>
                <div class="chartjs height-250">
                    <canvas id="line-stacked-area" height="250"></canvas>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-xs-3 text-xs-center">
                        <span class="text-muted">Total Projects</span>
                        <h2 class="block font-weight-normal">18</h2>
                        <progress class="progress progress-xs mt-2 progress-success" value="70" max="100"></progress>
                    </div>
                    <div class="col-xs-3 text-xs-center">
                        <span class="text-muted">Total Task</span>
                        <h2 class="block font-weight-normal">125</h2>
                        <progress class="progress progress-xs mt-2 progress-success" value="40" max="100"></progress>
                    </div>
                    <div class="col-xs-3 text-xs-center">
                        <span class="text-muted">Completed Task</span>
                        <h2 class="block font-weight-normal">242</h2>
                        <progress class="progress progress-xs mt-2 progress-success" value="60" max="100"></progress>
                    </div>
                    <div class="col-xs-3 text-xs-center">
                        <span class="text-muted">Total Revenue</span>
                        <h2 class="block font-weight-normal">$11,582</h2>
                        <progress class="progress progress-xs mt-2 progress-success" value="90" max="100"></progress>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card card-inverse bg-info">
            <div class="card-body">
                <div class="position-relative">
                    <div class="chart-title position-absolute mt-2 ml-2 white">
                        <h1 class="display-4">84%</h1>
                        <span>Employees Satisfied</span>
                    </div>
                    <canvas id="emp-satisfaction" class="height-400 block"></canvas>
                    <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3 white">
                        <a href="#" class="btn bg-info bg-darken-3 mr-1 white">Statistics <i class="icon-stats-bars"></i></a> for the last year.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Surveys</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#Survey</th>
                                    <th>Survey name/title</th>
                                    <th>action</th>
                                    <th>Link</th>
                                    <th>Copy</th>
                                </tr>
                            </thead>
                            <tbody id="append">
                                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td class="text-truncate"><a href="#" id="indexid"><?php echo e($index + 1); ?></a></td>
                                      <td class="text-truncate"><?php echo e($question->title); ?></td>
                                      <td class="text-truncate">
                                        <a href="/create/questions/<?php echo e($question->token); ?>/<?php echo e($question->title); ?>" class="btn btn-sm btn-info">view</a> 
                                        <a href="/create/questions/<?php echo e($question->token); ?>/<?php echo e($question->title); ?>" class="btn btn-sm btn-warning">Edit</a> 
                                        <a href="/survey/delete/<?php echo e($question->token); ?>" class="btn btn-sm btn-danger">Delete</a>
                                      </td>
                                       <td><a target="_blank" href="/monitoring-tool/<?php echo e($question->token); ?>" class="btn btn-sm btn-success">Share survey link</a></td>
                                       <td><a href="#" onclick="event.preventDefault(); var id= '<?php echo e($question->token); ?>'; copy(id,<?php echo e($index + 2); ?>);" class="btn btn-sm btn-success">Duplicate Survey</a></td>
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<script>

function copy(id){
    $.ajax({ 
        type: 'POST', 
        url: "/survey/copy/" + id + "",
        data:{_token:"<?php echo e(Session::token()); ?>"}
    })   
    .done(function(msg){
        var index = $("#indexid").text();
        token = "<?php echo e(Session::token()); ?>";
        $("#append").append(
            "<tr> \
                <td class='text-truncate'> \
                    <a href='#'>"+index+"</a> \
                </td> \
                <td class='text-truncate'>"+msg['new']['title']+"</td> \
                <td class='text-truncate'> \
                    <a href='/create/questions/"+msg['new']['token']+"' class='btn btn-sm btn-info'>view</a> \
                    <a href='/create/questions/"+msg['new']['token']+"' class='btn btn-sm btn-warning'>Edit</a> \
                    <a href='/survey/delete/"+msg['new']['token']+"' class='btn btn-sm btn-danger'>Delete</a> \
                </td> \
                <td> \
                    <a target='_blank' href='' class='btn btn-sm btn-success'>Share survey link</a> \
                </td> \
                <td> \
                    <a href='#' onclick='event.preventDefault(); copy("+msg['new']['token']+")' class='btn btn-sm btn-success'>Duplicate survey</a> \
                </td> \
            </tr>"
        );
    })
}

</script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>