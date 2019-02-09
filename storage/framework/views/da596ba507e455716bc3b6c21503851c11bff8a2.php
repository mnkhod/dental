<?php $__env->startSection('header'); ?>



    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/fullcalendar.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/dataTables.bootstrap4.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/datatables.responsive.bootstrap4.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/owl.carousel.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-stars.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/nouislider.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-datepicker3.min.css')); ?>" />

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <li>
        <a href="<?php echo e(url('/home')); ?>">
            <i class="iconsmind-Digital-Drawing"></i>
            <span>Самбар</span>
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/workers')); ?>">
            <i class="iconsmind-Administrator"></i> Ажилчид
        </a>
    </li>
    <li class="active">
        <a href="<?php echo e(url('/time')); ?>">
            <i class="iconsmind-Alarm"></i> Цаг
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/material')); ?>">
            <i class="iconsmind-Medicine-2"></i> Материал
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/income')); ?>">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row"><!-- row-->
    <!-- ajiltan nemeh-->
    <div class="col-xl-6 col-lg-12 mb-4"><!-- col start-->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Шинэ ажилтан нэмэх</h5>

                <form action="<?php echo e(url('/admin/add_staff')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputAddress2">Овог</label>
                                <input name="last_name" type="text" class="form-control" id="lname" placeholder="Овог">
                                <span id="lname_msg" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputAddress2">Нэр</label>
                                <input name="name" type="text" class="form-control" id="fname" placeholder="Нэр">
                                <span id="fname_msg" style="color:red"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Хүйс сонгох</label>
                            <select name="sex" id="sex" class="form-control">
                                <option value="0">Эр</option>
                                <option value="1">Эм</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Төрсөн он сар</label>
                                <input name="birth_date" class="form-control datepicker" id="birth" placeholder="Төрсөн он сар">
                                <span id="date_msg" style="color:red"></span>
                        </div>
                    </div>

                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Цахим хаяг</label>
                            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Цахим хаягаа оруулна уу">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Регистрийн дугаар</label>
                            <input name="register" type="text" class="form-control" id="registernum" placeholder="Регистрийн дугаараа оруулна уу">
                            <span id="registernum_msg" style="color:red"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Утасны дугаар</label>
                        <input name="phone_number" type="text" class="form-control" id="phone" placeholder="Утасны дугаараа оруулна уу">
                        <span id="phone_msg" style="color:red"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Гэрийн хаяг</label>
                        <input name="location" type="text" class="form-control" id="Address" placeholder="Гэрийн хаягаа оруулна уу">
                        <span id="address_msg" style="color:red"></span>
                    </div>

                    <label for="inputState">Сонгох</label>
                    <select name="role" id="inputState" class="form-control">
                        <option selected>Мэргэжил сонгоно уу ...</option>
                        <option value="1">Ресепшн</option>
                        <option value="2">Эмч</option>
                        <option value="3">Сувилагч</option>
                    </select><br>


                    <textarea class="form-control" data-val="true" data-val-length="Maximum = 1000000 characters" data-val-length-max="100000" id="info" name="info"  placeholder="Тайлбар"></textarea>
                    <br><br>
                    <h5 class="mb-12">Зураг оруулах</h5>
                    <label class="btn btn-outline-primary btn-upload" for="inputImage" title="Upload image file">
                        <input type="file" class="sr-only" id="Image" name="photo" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                        Зургаа сонгох
                    </label>
                    <div class="row">
                        <div class="col-12">
                            <div id="cropperContainer">
                                <img id="Image" alt="Cropper Image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="cropper-preview"></div>
                        </div>
                        <div class="col-2">
                            <div class="cropper-preview"></div>
                        </div>
                        <div class="col-1">
                            <div class="cropper-preview"></div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-sm-10">
                            <br>
                            <button onclick="validate()" type="button" class="btn btn-primary mb-0" >Ажилтан нэмэх</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--col end -->
    <!-- ajiltan nemeh-->
    <div class="col-xl-6 col-lg-12 mb-4"><!--table-->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Бүх ажилтан</h5>
                <table class="data-table">
                    <thead>
                    <tr>

                        <th>Нэр</th>
                        <th>Овог</th>
                        <th>Мэргэжил</th>
                        <th>Утас</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <p class="list-item-heading">
                                <a href="<?php echo e(url('/admin/add_staff/'.$user->id.'/profile')); ?>"><?php echo e($user->name); ?></a>
                            </p>
                        </td>
                        <td>
                            <p class="text-muted"><?php echo e($user->last_name); ?></p>
                        </td>
                        <td>
                            <p class="text-muted"><?php if($user->role->role_id ==1): ?>
                                                    Ресепшн
                                                    <?php elseif($user->role->role_id ==2): ?>
                                                        Эмч
                                                    <?php else: ?>
                                                        Сувилагч
                                                    <?php endif; ?></p>
                        </td>
                        <td>
                            <p class="text-muted"><?php echo e($user->phone_number); ?></p>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- table end-->
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
    <script src="<?php echo e(asset('js/validation.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>