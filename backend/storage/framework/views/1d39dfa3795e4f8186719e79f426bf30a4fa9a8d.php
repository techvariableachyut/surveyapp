<?php $__env->startSection('content'); ?>

<div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/survey/all">All Survey</a>
                </li>
                <li class="breadcrumb-item"><a href="/survey/answer/<?php echo e($question->token); ?>">Survey - <?php echo e($question->title); ?></a>
                </li>

                <li class="breadcrumb-item"><a href="/survey/answer/user/<?php echo e($answer->surveyId); ?>/<?php echo e($answer->token); ?>">Survey Response Id - <?php echo e($answer->token); ?> </a>
                </li>
              </ol>
        </div>

      <div class="content-wrapper">
        <div  class="content-header row"><h1 id="title"></h1></div>
        <div class="content-body">
            <div class="online_status"></div>
            <div id="surveyElement"></div>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <link type="text/css" rel="stylesheet" href="/css/jquery-ui.css" />
    <link type="text/css" rel="stylesheet" href="/css/survey.css" />
    <link type="text/css" rel="stylesheet" href="/css/jquery-confirm.min.css">
    <script>
        window.__question__ = <?= $question ?>;
        window.__answer__ = <?= $answer ?>;
        window.__token__ = "<?php echo e(Session::token()); ?>";
    </script>

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap-notify.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/survey.app.admin.js"></script>
    <script src="/js/surveyjs-widgets.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/survey_admin.js"></script>
    <script src="/js/jquery-confirm.min.js"></script>
    
    
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>