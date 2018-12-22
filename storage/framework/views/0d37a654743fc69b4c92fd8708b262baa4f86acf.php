<div class="media">
    <div class="media-body">
        <h4 class="media-heading"><?php echo e($twitt->user->name); ?> </h4>
        <span><?php echo e($twitt->twitt); ?></span>
        <ul class="nav nav-pills nav-pills-custom">
            <li   ><a  onclick="likeDislike('<?php echo e($twitt->id); ?>')"  id="twitt_link_<?php echo e($twitt->id); ?>"  href="javascript:void(0)"   >  <?php echo likeDislikeIcon($twitt->id,Auth::user()->id); ?></a></li>
        </ul>
    </div>
</div>
