@extends('layouts.reception')
@section('header')
    <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}"/>


    {{--End css style gh met link file oruulna--}}
@endsection
@section('content')
    {{--//Za aliv l dee--}}
    <script>
        document.getElementById('receptionLease').classList.add('active');
    </script>
    <div class="row">
        @foreach($leases as $lease)
            <?php
            $checkin = \App\CheckIn::find($lease->checkin_id);
            $user = \App\User::find($checkin->user_id);
            ?>
        <div class="col-md-4 col-sm-6 col-lg-4 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-justify">
                        <p class="list-item-heading mb-1 text-center">{{$user->name}} {{$user->last_name}}</p>
                        <p class="mb-4 text-muted text-small text-center"><h5 ><span class="text-danger">{{$lease->total}}₮</span> төлөхөөс <span class="text-danger">{{$lease->price}}₮</span> үлдсэн байна</h5></p>
                        <!--                                        progress bar-->
                        <div class="progress progress-striped"><div class="progress-bar progress-bar-info" style="width:{{(($lease->total -$lease->price)/$lease->total)*100}}%"></div></div>
                        <div>
                            <br>
                            Утас: {{$user->phone_number}} <br>
                            Email: {{$user->email}} <br><br>
                            <form class="form-inline" action="{{url('/reception/lease/store')}}" method="post">
                                @csrf
                                <input name="price" required type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="...">
                                <input type="hidden" value="{{$lease->id}}" name="lease_id">
                                <input type="hidden"  value="{{$checkin->id}}" name="checkin_id">
                                <button type="submit" class="btn btn-sm btn-outline-primary mb-2">Төлөх</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
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
    {{--Scriptuudiig include hiiideg heseg--}}
@endsection
