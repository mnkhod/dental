<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/fullcalendar.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/dataTables.bootstrap4.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/datatables.responsive.bootstrap4.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/owl.carousel.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-stars.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/nouislider.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-datepicker3.min.css')); ?>"/>

    <style>
        .hidden {
            opacity: 0;
            background-color: white;
            border: 0px;
        }

        .hidden:hover, .hidden:focus {
            opacity: 0.2;
            background-color: #8f8f8f;
        }

    </style>
    
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
            <i class="iconsmind-Administrator"></i> Үйлчлүүлэгч
        </a>
    </li>
    <li class="active">
        <a href="<?php echo e(url('/admin/time')); ?>">
            <i class="iconsmind-Alarm"></i> Цаг
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/admin/product')); ?>">
            <i class="iconsmind-Medicine-2"></i> Төлбөр
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/admin/transaction')); ?>">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalRight" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Цаг захиалах<br><span id="nameShow">Алимаа</span> <span
                                id="timeShow"></span>:00</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(url('reception/time/add')); ?>" method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Нэр</label>
                            <input name="name" autocomplete="off" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Утасны дугаар</label>
                            <input name="phone" autocomplete="off" type="text" class="form-control" placeholder="">
                        </div>
                        <input type="hidden" name="time" id="timeInput">
                        <input type="hidden" name="shift_id" id="shiftInput">
                        <div class="form-group">
                            <label>Шаардагдах хугацаа (цагаар)</label>
                            <input name="hours" autocomplete="off" type="number" class="form-control" placeholder="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ЦАГ ЗАХИАЛАХ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="card">
            <div class="card-body">

                <table class="table table-responsive text-center table-bordered">
                    <tr>
                        <th></th>
                        <?php $s = 0?>
                        <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><img style="border-radius: 100%" src="<?php echo e(asset('img/profile5.jpg')); ?>"
                                     width="25px"> <?php echo e($shift->doctor->name); ?></th>
                            <?php $s++?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php for($i = 0; $i<6; $i++): ?>
                        <tr>
                            <td height="90px"><?php echo e(9+$i); ?>:00</td>
                            <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($shift->shift_id == 0 || $shift->shift_id ==2): ?>
                                    <?php if($appointment = $shift->appointments->where('start', 9+$i)->first()): ?>
                                        <td height="90px" rowspan="<?php echo e($appointment->end - $appointment->start); ?>">
                                            <button class="btn btn-primary btn-block text-left"
                                                    style="border-radius: 20px; height: 100%;">
                                                <?php echo e($appointment->name); ?><br><span><?php echo e($appointment->phone); ?></span></button>
                                        </td>
                                    <?php elseif($appointment = $shift->appointments->where('start','<', 9+$i)->where('end', '>', 9+$i)->first()): ?>
                                    <?php else: ?>
                                        <td height="90px" rowspan="1">
                                            <button onclick="bookTime('<?php echo e(9+$i); ?>', '<?php echo e($shift->id); ?>', '<?php echo e($shift->doctor->name); ?>')"
                                                    class="btn btn-primary btn-block text-left hidden"
                                                    style="border-radius: 20px; height: 100%;">Захиалга
                                                нэмэх<br><span>бол дарна уу</span></button>
                                        </td>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <td height="90px" style="background-color: #bcbcbc"></td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endfor; ?>
                    <?php for($i = 6; $i<12; $i++): ?>
                        <tr>
                            <td height="90px"><?php echo e(9+$i); ?>:00</td>
                            <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($shift->shift_id == 1 || $shift->shift_id ==2): ?>
                                    <?php if($appointment = $shift->appointments->where('start', 9+$i)->first()): ?>
                                        <td height="90px" rowspan="<?php echo e($appointment->end - $appointment->start); ?>">
                                            <button class="btn btn-primary btn-block text-left"
                                                    style="border-radius: 20px; height: 100%;">
                                                <?php echo e($appointment->name); ?><br><span><?php echo e($appointment->phone); ?></span></button>
                                        </td>
                                    <?php elseif($appointment = $shift->appointments->where('start','<', 9+$i)->where('end', '>', 9+$i)->first()): ?>
                                    <?php else: ?>
                                        <td height="90px" rowspan="1">
                                            <button onclick="bookTime('<?php echo e(9+$i); ?>', '<?php echo e($shift->id); ?>', '<?php echo e($shift->doctor->name); ?>')"
                                                    class="btn btn-primary btn-block text-left hidden"
                                                    style="border-radius: 20px; height: 100%;">Захиалга
                                                нэмэх<br><span>бол дарна уу</span></button>
                                        </td>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <td height="90px" style="background-color: #bcbcbc"></td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endfor; ?>

                </table>
            </div>
            
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>
        function bookTime(time, shift_id, doctor_name) {
            document.getElementById("timeShow").innerHTML = time;
            document.getElementById("timeInput").value = time;
            document.getElementById("nameShow").innerHTML = doctor_name;
            document.getElementById('shiftInput').value = shift_id;
            $("#exampleModalRight").modal();
        }
    </script>
    <script src="<?php echo e(asset('js/vendor/Chart.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/chartjs-plugin-datalabels.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/progressbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/select2.full.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/nouislider.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/Sortable.js')); ?>"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>