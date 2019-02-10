<?php $__env->startSection('header'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <li>
        <a href="<?php echo e(url('/admin')); ?>">
            <i class="iconsmind-Digital-Drawing"></i>
            <span>Самбар</span>
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/admin/add_staff')); ?>">
            <i class="iconsmind-Administrator"></i> Ажилчид
        </a>
    </li>
    <li class="active">
        <a href="<?php echo e(url('/admin/time')); ?>">
            <i class="iconsmind-Alarm"></i> Цаг
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/admin/product')); ?>">
            <i class="iconsmind-Medicine-2"></i> Материал
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/admin/transaction')); ?>">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive text-center">
                        <tr>
                            <th>Эмч</th>
                            <th><?php echo e(date('Y-m-d')); ?></th>
                            <th><?php echo e(date('Y-m-d', strtotime("+1 Days"))); ?></th>
                            <th><?php echo e(date('Y-m-d', strtotime("+2 Days"))); ?></th>
                            <th><?php echo e(date('Y-m-d', strtotime("+3 Days"))); ?></th>
                            <th><?php echo e(date('Y-m-d', strtotime("+4 Days"))); ?></th>
                            <th><?php echo e(date('Y-m-d', strtotime("+5 Days"))); ?></th>
                            <th><?php echo e(date('Y-m-d', strtotime("+6 Days"))); ?></th>
                        </tr>
                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th rowspan="2"><br><br><br>
                                    <?php echo e($doctor->staff->name); ?></th>
                                <?php for($i = 0; $i < 7; $i++): ?>
                                    <?php $time = $shifts->where('date', date('Y-m-d', strtotime('+' . $i . ' Days')))->where('doctor_id', $doctor->staff->id)->where('shift_id', 0)->first(); ?>
                                    <?php if($time): ?>
                                        <td>
                                            <button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right"
                                                                                                   style="font-size: 10px">8 хүн захиалсан</span>
                                            </button>
                                        </td>

                                    <?php elseif($shifts->where('date', date('Y-m-d', strtotime('+' . $i . ' Days')))->where('doctor_id', $doctor->staff->id)->where('shift_id', 2)->first()): ?>
                                        <td>
                                            <button class="btn btn-primary">Өглөөний ээлж<br><span class="text-right"
                                                                                                   style="font-size: 10px">8 хүн захиалсан</span>
                                            </button>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <a href="<?php echo e(url('/admin/time/'.$i.'/'.$doctor->staff->id.'/0')); ?>">
                                                <button class="btn btn-light">Тавигдаагүй<br><span class="text-right"
                                                                                                   style="font-size: 10px">ээлж тавих</span>
                                                </button>
                                            </a>
                                        </td>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <?php for($i = 0; $i < 7; $i++): ?>
                                    <?php $time = $shifts->where('date', date('Y-m-d', strtotime('+' . $i . ' Days')))->where('doctor_id', $doctor->staff->id)->where('shift_id', 1)->first(); ?>
                                    <?php if($time): ?>
                                        <td>
                                            <button class="btn btn-success">Оройний ээлж<br><span class="text-right"
                                                                                                  style="font-size: 10px">8 хүн захиалсан</span>
                                            </button>
                                        </td>
                                    <?php elseif($shifts->where('date', date('Y-m-d', strtotime('+' . $i . ' Days')))->where('doctor_id', $doctor->staff->id)->where('shift_id', 2)->first()): ?>
                                        <td>
                                            <button class="btn btn-success">Оройний ээлж<br><span class="text-right"
                                                                                                  style="font-size: 10px">8 хүн захиалсан</span>
                                            </button>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <a href="<?php echo e(url('/admin/time/'.$i.'/'.$doctor->staff->id.'/1')); ?>">
                                                <button class="btn btn-light">Тавигдаагүй<br><span class="text-right"
                                                                                                   style="font-size: 10px">ээлж тавих</span>
                                                </button>
                                            </a>
                                        </td>
                                    <?php endif; ?>
                                <?php endfor; ?>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </table>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>