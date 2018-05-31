<?php $__env->startSection('content'); ?>
<div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/survey/all">All Survey</a>
                </li>
              </ol>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Of All Survey</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#Survey</th>
                                    <th>Survey name/title</th>
                                    <th>All Responses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $qanda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td class="text-truncate"><a href="#"><?php echo e($index + 1); ?></a></td>
                                      <td class="text-truncate">
                                      	<?php echo e($value->title); ?>

                                      </td>
                                      <td class="text-truncate">
                                        <a href="/survey/answer/<?php echo e($value->token); ?>" class="btn btn-sm btn-info">view</a>
                                      </td>
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>