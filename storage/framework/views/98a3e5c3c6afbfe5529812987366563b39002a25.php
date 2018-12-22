<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="panel panel-info">

                    <form id="twitt_form" method="POST" action="<?php echo e(route('twitt')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <div class="form-group has-feedback">
                                        <input type="text" id="twitt_text" name="twitt_text" class="form-control"
                                               name="twitt" placeholder="Write Your Twitt">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <i class="fal fa-heart"></i>
                    <div class="panel-body" id="twitt_result">

                        <?php if($twitts->count() >  0): ?>

                            <?php $__currentLoopData = $twitts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $twitt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo e($twitt->user->name); ?> </h4>

                                        <span><?php echo e($twitt->twitt); ?></span>
                                        <ul class="nav nav-pills nav-pills-custom">
                                            <li   ><a  onclick="likeDislike('<?php echo e($twitt->id); ?>')"  id="twitt_link_<?php echo e($twitt->id); ?>"  href="javascript:void(0)"   >  <?php echo likeDislikeIcon($twitt->id,Auth::user()->id); ?></a></li>


                                        </ul>
                                    </div>
                                </div>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>

                    </div>
                </div>

                <br>
                <br>
                <br>

            </div>

            <div class="col-sm-3">


            </div>
        </div>
    </div>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>