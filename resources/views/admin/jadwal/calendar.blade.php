@extends('layouts.admin')
@section('content')

<link href="{{asset('/')}}gen/vendors/nprogress/nprogress.css" rel="stylesheet">
<link href="{{asset('/')}}gen/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="{{asset('/')}}gen/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

<script src="{{asset('/')}}gen/vendors/nprogress/nprogress.js"></script>
<script src="{{asset('/')}}gen/vendors/moment/min/moment.min.js"></script>
<script src="{{asset('/')}}gen/vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Kalendar</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div id='cal'></div>

                <script>
$(document).ready(init_cal);

function  init_cal() {
    if (typeof ($.fn.fullCalendar) === 'undefined') {
        return;
    }

    var date = new Date(),
            d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear(),
            started,
            categoryClass;

    var calendar = $('#cal').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        selectable: false,
        selectHelper: false,
        editable: false,
        events: [
            @foreach($objects as $jadwal)
            {
                title: '{{$jadwal->klien->nama}}',
                start: new Date({{$jadwal->tanggal->format('Y')}}, {{$jadwal->tanggal->format('m')-1}}, {{$jadwal->tanggal->format('d')}},
                    {{intval(substr($jadwal->mulai,0,2))}},{{intval(substr($jadwal->mulai,3,2))}}),
                end: new Date({{$jadwal->tanggal->format('Y')}}, {{$jadwal->tanggal->format('m')-1}}, {{$jadwal->tanggal->format('d')}},
                    {{intval(substr($jadwal->selesai,0,2))}},{{intval(substr($jadwal->selesai,3,2))}}),
                url: "{{route('jadwal_createEdit',$jadwal->id)}}"
            },
            @endforeach
            ]
    });

}
;
                </script>

            </div>
        </div>
    </div>
</div>
@endsection