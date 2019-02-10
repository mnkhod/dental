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
    <li class="active">
        <a href="<?php echo e(url('/admin/add_staff')); ?>">
            <i class="iconsmind-Administrator"></i> Үйлчлүүлэгч
        </a>
    </li>
    <li>
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
    <div class="row">
        <div class="col-lg-4">
            <h3>
                <i class="iconsmind-Folder-Search"></i>
                <span class="align-middle d-inline-block pt-1"> Хайлтын үр дүн-"<?php echo e($input); ?>"</span>
            </h3>
        </div>
    </div>
    <div class="separator mb-5"></div>
    <br>
    <div class="row">
        <?php $__currentLoopData = $results->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card ">
                <div class="card-body">
                    <div class="text-center">
                        <p class="list-item-heading mb-1"><a href="<?php echo e(url('/reception/users/'.$result->id)); ?>"><?php echo e($result->last_name); ?> <?php echo e($result->name); ?></a></p>
                        <br>
                        <div class="text-center">
                            <p class="text-muted text-small mb-2">Регистрийн дугаар</p>
                            <p class="mb-3">
                                <?php echo e($result->register); ?>

                            </p>

                            <p class="text-muted text-small mb-2">Утасны дугаар</p>
                            <p class="mb-3">
                                <?php echo e($result->phone_number); ?>

                            </p>
                            <p class="text-muted text-small mb-2">Цахим хаяг</p>
                            <p class="mb-3">
                                <?php echo e($result->email); ?>

                            </p>
                            <p class="text-muted text-small mb-2">Гэрийн хаяг</p>
                            <p class="mb-3">
                                <?php echo e($result->location); ?>

                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

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