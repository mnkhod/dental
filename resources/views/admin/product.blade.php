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
          <a href="{{url('/home')}}">
              <i class="iconsmind-Digital-Drawing"></i>
              <span>Самбар</span>
          </a>
      </li>
      <li>
          <a href="{{url('/workers')}}">
              <i class="iconsmind-Administrator"></i> Ажилчид
          </a>
      </li>
      <li class="active">
          <a href="{{url('/time')}}">
              <i class="iconsmind-Alarm"></i> Цаг
          </a>
      </li>
      <li>
          <a href="{{url('/material')}}">
              <i class="iconsmind-Medicine-2"></i> Материал
          </a>
      </li>
      <li>
          <a href="{{url('/income')}}">
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
                            <th>Барааны нэр</th>
                            <th>Ширхэг</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                <button type="button" class="btn " data-toggle="modal" data-target="#exampleModalPopovers">
                                    {{$product->name}}
                                </button>
                            </td>
                            <td>
                                <p class="text-muted">{{$product->quantity}}</p>
                            </td>
                        </tr>
                        @endforeach

                        <div id="exampleModalPopovers" class="modal fade show" tabindex="-1" role="dialog"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalPopoversLabel">Барааны мэдээллийг өөрчлөх</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="col-md-11 mb-3">
                                        <label for="validationCustomUsername">Тоо</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">№</span>
                                            </div>
                                            <input type="text" class="form-control" id="validationCustomUsername"
                                                   placeholder="Бүтээгдэхүүний ширхэг" aria-describedby="inputGroupPrepend" required>
                                        </div>
                                    </div>
                                    <div class="col-md-11 mb-3">
                                        <label for="validationCustomUsername">Үнэ</label>
                                        <div class="input-group">
                                            <div class="input-group-prestart">
                                                <span class="input-group-text" id="inputGroupPrepend">₮</span>
                                            </div>
                                            <input type="text" class="form-control" id="validationCustomUsername"
                                                   placeholder="Бүтээгдэхүүний үнэ" aria-describedby="inputGroupPrepend" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                                        <button type="button" class="btn btn-primary">Хадгалах</button>
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