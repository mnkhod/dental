  @extends('layouts.app')
  @section('header')



      <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}" />
      <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}" />
      <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}" />
      <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}" />
      <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}" />
      <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}" />
      <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}" />
      <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}" />

  @endsection
  @section('menu')
      <li>
          <a href="{{url('/admin')}}">
              <i class="iconsmind-Digital-Drawing"></i>
              <span>Самбар</span>
          </a>
      </li>
      <li>
          <a href="{{url('/admin/add_staff')}}">
              <i class="iconsmind-Administrator"></i> Ажилчид
          </a>
      </li>
      <li>
          <a href="{{url('/admin/time')}}">
              <i class="iconsmind-Alarm"></i> Цаг
          </a>
      </li>
      <li class="active">
          <a href="{{url('/admin/product')}}">
              <i class="iconsmind-Medicine-2"></i> Материал
          </a>
      </li>
      <li>
          <a href="{{url('/admin/transaction')}}">
              <i class="iconsmind-Space-Needle"></i> Санхүү
          </a>
      </li>
  @endsection
  @section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Шинэ бараа нэмэх</h5>

                    <form class="form-inline" action="{{url('/admin/add_product')}}" method="post" >
                        @csrf
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+</div>
                            </div>
                            <input name="name" type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                   placeholder="Барааны нэр">
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary mb-2" style="border-radius: 0px">Шинэ бараа нэмэх</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="btn-group float-right float-none-xs mt-2">
                        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                            <input placeholder="Хайх...">
                        </div>
                    </div>
                    <h5 class="card-title">Барааны жагсаалт
                        <br> <span class="text-muted text-small d-block">Барааны нэрэн дээр даран тоо болон үнийг өөрчилнө үү</span></h5>



                    <table class="data-table responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">

                        <thead>
                        <tr>
                            <th>Дугаар</th>
                            <th>Барааны нэр</th>
                            <th>Ширхэг</th>
                            <th>Үйлдэл</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1?>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$i}}</td>
                            <?php $i = $i + 1?>
                            <td>
                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalPopovers" onclick="onItemClick({{$product->id}})">
                                    {{$product->name}}
                                </button>
                            </td>
                            <td>
                                <p class="text-muted">{{$product->quantity}}</p>

                            <td>
                                <a href="{{url('/admin/delete_product').'/'.$product->id}}">
                                    <i class="simple-icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        <script>
                            function onItemClick(id) {
                                document.getElementById('hidden').value = id;
                                return true;
                            }
                        </script>

                        <div id="exampleModalPopovers" class="modal fade show" tabindex="-1" role="dialog"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalPopoversLabel">Барааг нэмэж хасах</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>

                                    </div>

                                    <div class="    col-md-12 ">
                                        {{--<label for="validationCustomUsername">Тоо</label>--}}
                                        {{--<div class="input-group">--}}
                                            {{--<div class="input-group-prepend">--}}
                                                {{--<span class="input-group-text" id="inputGroupPrepend">№</span>--}}
                                            {{--</div>--}}
                                            {{--<input type="number" class="form-control" id="validationCustomUsername"--}}
                                                   {{--name="quantity" placeholder="Бүтээгдэхүүний ширхэг" aria-describedby="inputGroupPrepend" required>--}}
                                        {{--</div>--}}
                                        <!-- row-->


                                                <ul class="nav nav-tabs separator-tabs ml-0 mb-6" role="tablist">
                                                    <li class="nav-item ">
                                                                <a class="nav-link active " id="first-tab" data-toggle="tab" href="#first" role="tab"
                                                                   aria-controls="first" aria-selected="true" >Бүтээгдэхүүн нэмэх</a>
                                                    </li>


                                                    <li class="nav-item">
                                                            <a class="nav-link " id="second-tab" data-toggle="tab" href="#second" role="tab"
                                                               aria-controls="second" aria-selected="false">Бүтээгдэхүүн хасах</a>
                                                    </li>


                                                </ul>

                                            <div class="tab-content">

                                                    <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <form action="{{url('/admin/edit_product')}}" method="post">
                                                                    @csrf
                                                                    <input name="id" type="hidden" value="0" id="hidden">

                                                                    <input name="price" class="form-control mb-3" type="number" placeholder="Үнийн дүн">
                                                                    <input name="quantity" class="form-control mb-3" type="number" placeholder="Тоо ширхэг">
                                                                    <button class="btn btn-primary btn-block" type="submit">Хадгалах</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                            <div class="tab-pane" id="second" role="tabpane2" aria-labelledby="second-tab">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <form action="{{url('/admin/add_transaction')}}" method="post">
                                                                    <input name="id" type="hidden" value="0" id="hidden">
                                                                    @csrf
                                                                    <input name="description" class="form-control mb-3" type="text" placeholder="Тайлбар">
                                                                    <input class="form-control mb-3" name="price" type="number" placeholder="Тоо ширхэг">
                                                                    <button class="btn btn-primary btn-block" type="submit">Хадгалах</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



                                    {{--<div class="col-md-6">--}}
                                        {{--<label for="validationCustomUsername">Үнэ</label>--}}
                                        {{--<div class="input-group">--}}
                                            {{--<div class="input-group-prestart">--}}
                                                {{--<span class="input-group-text" id="inputGroupPrepend">₮</span>--}}
                                            {{--</div>--}}
                                            {{--<input type="number" class="form-control" id="validationCustomUsername"--}}
                                                   {{--name="price" placeholder="Бүтээгдэхүүний үнэ" aria-describedby="inputGroupPrepend" required>--}}
                                        {{--</div>--}}
                               {{--<button type="submit" class="btn btn-danger">--}}
                                   {{--<i class="delete-library-item">--}}
                                   {{--</i>--}}
                               {{--</button>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>--}}
                                        {{--<button type="submit" class="btn btn-primary">Хадгалах</button>--}}
                                    {{--</div>--}}


  @endsection
  @section('footer')


      <script src="{{asset('js/vendor/Chart.bundle.min.js')}}"></script>
      <script src="{{asset('js/vendor/chartjs-plugin-datalabels.js')}}"></script>
      <script src="{{asset('js/vendor/moment.min.js')}}"></script>
      <script src="{{asset('js/vendor/fullcalendar.min.js')}}"></script>
      <script src="{{asset('js/vendor/datatables.min.js')}}"></script>
      <script src="{{asset('js/vendor/owl.carousel.min.js')}}"></script>
      <script src="{{asset('js/vendor/progressbar.min.js')}}"></script>
      <script src="{{asset('js/vendor/jquery.barrating.min.js')}}"></script>
      <script src="{{asset('js/vendor/select2.full.js')}}"></script>
      <script src="{{asset('js/vendor/nouislider.min.js')}}"></script>
      <script src="{{asset('js/vendor/bootstrap-datepicker.js')}}"></script>
      <script src="{{asset('js/vendor/Sortable.js')}}"></script>

  @endsection