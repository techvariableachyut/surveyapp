<?php $__env->startSection('content'); ?>
<div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/survey/all">All Survey</a>
                </li>
                <li class="breadcrumb-item"><a href="/survey/answer/<?php echo e($question->token); ?>">Survey - <?php echo e($question->title); ?></a>
                </li>
              </ol>
        </div>
<div class="col-lg-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h4 class="card-title"><?php echo e($question->title); ?></h4>
                </div> -->
                <div class="card-body">


                <div class="card-block">
                        <p>
                        <?php echo e($question->title); ?> 
                            <span class="float-xs-right">
                                <a href="/survey/answer/<?php echo e($question->token); ?>"><i class="icon-arrow-left2"></i> All Non Reviewed Surveys </a>
                            </span>
                        </p>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Status</th>
                                    <th>View Response</th>
                                    <th>Downlaod</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td class="text-truncate"><a href="#"><?php echo e($index + 1); ?></a></td>
                                      <td class="text-truncate">
                                          <?php echo e($a->done); ?>

                                      </td>
                                      <td> <a href="/survey/answer/user/<?php echo e($a->surveyId); ?>/<?php echo e($a->token); ?>">View</a></td>
                                      <td><a href="/answer/create/csv/<?php echo e($a->surveyId); ?>/<?php echo e($a->token); ?>" class="btn btn-sm">Download</a></td>
                                      
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div style="padding: 5%;">
                            <?php if(count($answers) == 0): ?>
                                No reviewed responses.
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>