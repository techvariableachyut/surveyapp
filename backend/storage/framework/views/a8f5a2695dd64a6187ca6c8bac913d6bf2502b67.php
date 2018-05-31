<?php $__env->startSection('content'); ?>

<div class="row">
<div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Survey</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#Survey</th>
                                    <th>Survey title</th>
                                    <th>Actions</th>
                                    <th>Link</th>
                                    <th>Responses</th>
                                </tr>
                            </thead>
                            <tbody id="append">
                                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-truncate"><a href="#" id="indexid"><?php echo e($index + 1); ?></a></td>
                                        <td class="text-truncate">
                                            <?php if(!$question->title): ?>
                                                -
                                            <?php else: ?>
                                                <?php echo e($question->title); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td class="text-truncate">
                                            <a href="/create/questions/<?php echo e($question->token); ?>/<?php echo e($question->title); ?>" class="btn btn-sm btn-warning">Edit</a> 
                                            <a onclick="deleteSurvey('<?php echo e($question->token); ?>')" href="#"  class="btn btn-sm btn-danger">Delete</a>
                                            <a href="#" onclick="event.preventDefault(); var id= '<?php echo e($question->token); ?>'; copy(id,'<?php echo e($index + 2); ?>','<?php echo e(Session::token()); ?>');" class="btn btn-sm btn-success">Make a Copy</a>
                                            <a href="/answers/csv/all/<?php echo e($question->token); ?>"  class="btn btn-sm btn-default">Download</a>
                                        </td>
                                        <td>
                                            <a target="_blank" href="/monitoring-tool/<?php echo e($question->token); ?>" class="btn btn-sm btn-success">
                                                <i class="icon-android-share-alt"></i>
                                            </a>
                                        </td>
                                        <td><a href="/survey/answer/<?php echo e($question->token); ?>" class="btn btn-sm btn-default">Responses</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        
                        <div style="padding: 5%;">
                            <?php if(count($questions) == 0): ?>
                                No results for any kind of Survey found. <a href="/create/question" class="btn btn-sm btn-info">Create Survey</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>