<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/fullcalendar.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/dataTables.bootstrap4.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/datatables.responsive.bootstrap4.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/owl.carousel.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-stars.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/nouislider.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-datepicker3.min.css')); ?>" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <li  class="active">
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
    <li>
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
    <div class="row mb-3"><!-- row-->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                        <div class="col-md-7 text-right"><h4><?php echo e($users_number); ?></h4>Үйлчлүүлэгч</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                        <div class="col-md-7 text-right"><h4><?php echo e($roles); ?></h4>Ажилтан</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                        <div class="col-md-7 text-right"><h4>23</h4>Захиалгууд</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                        <div class="col-md-7 text-right"><h4>20</h4>Өнөөдрийн эмчилгээ</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row end-->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>7 хоногийн ачаалал</h4>
                    <div class="ct-chart ct-golden-section" id="chart1"></div>
                    <script>
                        new Chartist.Line('.ct-chart', {
                            labels: ['Даваа', 'Мягмар', 'Лхагва', 'Пүрэв', 'Баасан', 'Бямба', 'Ням'],
                            series: [
                                [12, 9, 7, 8, 5],
                                [2, 1, 3.5, 7, 3],
                                [1, 3, 4, 5, 6]
                            ]
                        }, {
                            fullWidth: true,
                            chartPadding: {
                                right: 40
                            }
                        });

                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
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