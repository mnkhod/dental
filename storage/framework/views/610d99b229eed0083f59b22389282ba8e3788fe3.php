<?php $__env->startSection('header'); ?>



    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/fullcalendar.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/dataTables.bootstrap4.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/datatables.responsive.bootstrap4.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/owl.carousel.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-stars.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/nouislider.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-datepicker3.min.css')); ?>"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
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
    <li class="active">
        <a href="<?php echo e(url('/admin/transaction')); ?>">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row"><!-- row-->

        <div class="col-md-3">
            <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                       aria-controls="first" aria-selected="true">ЗАРЛАГА</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " id="second-tab" data-toggle="tab" href="#second" role="tab"
                       aria-controls="second" aria-selected="false">ЦАЛИН</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="third-tab" data-toggle="tab" href="#third" role="tab"
                       aria-controls="third" aria-selected="false">ОРЛОГО</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" action="<?php echo e(url('/admin/transaction/add')); ?>">
                                <?php echo csrf_field(); ?>
                                <input name="price" class="form-control mb-3" type="number" placeholder="Үнийн дүн">
                                <input name="description" class="form-control mb-3" type="text" placeholder="Тайлбар">
                                <button class="btn btn-primary btn-block" type="submit">ЗАРЛАГА ОРУУЛАХ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="second" role="tabpane2" aria-labelledby="second-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" action="<?php echo e(url('admin/transaction/salary')); ?>">
                                <?php echo csrf_field(); ?>
                                <select class="form-control mb-3" name="staff">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->staff->id); ?>"><?php echo e($role->staff->name); ?>/<?php if($role->id == 0): ?>
                                                Менежер<?php elseif($role->id == 1): ?>Pесепшн<?php elseif($role->id == 2): ?>
                                                Доктор<?php elseif($role->id == 3): ?>Сувилагч<?php else: ?> Бусад<?php endif; ?>/
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input class="form-control mb-3" name="price" type="number" placeholder="Үнийн дүн">
                                <button class="btn btn-primary btn-block" type="submit">ОРУУЛАХ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="third" role="tabpane3" aria-labelledby="third-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="<?php echo e(url('admin/transaction/income')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input class="form-control mb-3" name="price" type="number" placeholder="Үнийн дүн">
                                <input class="form-control mb-3" name="description" type="text" placeholder="Тайлбар">
                                <button class="btn btn-primary btn-block">ОРЛОГО ОРУУЛАХ</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Зарлагын бүтэц</h5>
                    <?php $i = 1?>
                    <?php $sum = 0?>
                    <?php $income = 0?>
                    <?php $outcome = 0?>
                    <?php $material = 0?>
                    <?php $salary = 0?>
                    <?php $other = 0?>
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++;?>
                            <?php $sum = $sum + $transaction->price;
                            if ($transaction->price > 0) {
                                $income = $income + $transaction->price;
                            } else {
                                $outcome = $outcome + $transaction->price;
                                if ($transaction->type == 2) {
                                    $material = $material + $transaction->price;
                                } elseif($transaction->type == 1) {
                                    $salary = $salary + $transaction->price;
                                } else {
                                    $other = $other + $transaction->price;
                                }
                            }
                            ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="ct-chart ct-golden-section" id="chart1"></div>
                    <b style="color: #f4c63d">O</b> - Бусад<br>
                    <b style="color: #d70206">O</b> - Цалин<br>
                    <b style="color: #f05b4f">O</b> - Материал
                    <script>
                        var data = {
                            series: [<?php echo e(-1*$salary); ?>, <?php echo e(-1*$material); ?>, <?php echo e(-1*$other); ?>]
                        };

                        var sum = function (a, b) {
                            return a + b
                        };

                        new Chartist.Pie('.ct-chart', data, {
                            labelInterpolationFnc: function (value) {
                                return Math.round(value / data.series.reduce(sum) * 100) + '%';
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-md-6">
                    <form method="post" action="<?php echo e(url('/admin/transaction/date')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <a href="#" onclick="$(this).closest('form').submit()">Хугацаа өөрчлөн харах</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="date" name="start_date" autocomplete="off" class="form-control datepicker" style="background-color: #f8f8f8; border-color: #f8f8f8; border-bottom-color: gray; padding: 0px"
                                   placeholder="Эхлэл" value="<?php if($start_date): ?><?php echo e(date('m/d/Y', $start_date)); ?><?php else: ?><?php echo e(date('m/d/Y', strtotime('-30 Days'))); ?><?php endif; ?>">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</span>
                            <input name="end_date" autocomplete="off" class="form-control datepicker " style="background-color: #f8f8f8; border-color: #f8f8f8; border-bottom-color: gray; padding: 0px"
                                   placeholder="Төгсгөл" value="<?php if($end_date): ?><?php echo e(date('m/d/Y', $end_date)); ?><?php else: ?><?php echo e(date('m/d/Y')); ?><?php endif; ?>">
                            <a href="#" onclick="$(this).closest('form').submit()">үзэх</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    <a href="#" onclick="exportTableToExcel('myTable', 'tselmeg')"><i class="iconsmind-File-Excel"></i> Excel-ээр татах</a>
                </div>
            </div>

            
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                                <div class="col-md-7 text-right"><h4>Зарлага</h4><?php echo e($outcome); ?>₮</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                                <div class="col-md-7 text-right"><h4>Орлого</h4><?php echo e($income); ?>₮</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 text-center"><i class="iconsmind-Money text-primary" style="font-size: 50px;"></i></div>
                                <div class="col-md-7 text-right"><h4>Ашиг</h4><?php echo e($sum); ?>₮</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            <table class="data-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Үнийн дүн</th>
                                    <th>Төрөл</th>
                                    <th>Тайлбар</th>
                                    <th>Хугацаа</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1?>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($transaction->price); ?></td>
                                        <td><?php if($transaction->type == 1): ?>Цалин<?php elseif($transaction->type == 2): ?>
                                                Материал<?php else: ?> Бусад<?php endif; ?></td>
                                        <td><?php echo e($transaction->description); ?></td>
                                        <td><?php echo e($transaction->created_at); ?></td>
                                        <?php $i++;?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- row end-->
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