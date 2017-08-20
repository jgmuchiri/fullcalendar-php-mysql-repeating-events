<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fullcalendar repeating events with PHP & MySQL</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet" type="text/css">

    @stack('styles')
</head>
<body>

<div class="container">

    <br/>
    <div class="title">Calendar

        <button class="btn btn-primary btn-sm pull-right create-event-btn"><i class="glyphicon glyphicon-plus"></i> new
            event
        </button>
    </div>

    @yield('content')
</div>

<script
        src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/loadingoverlay.min.js"></script>
<script type="text/javascript" src="/js/loadingoverlay_progress.min.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"
        type="text/javascript"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-notify.js"></script>
<script type="text/javascript">
    function notice(errorNote, type) {
        if(type==="error"){
            type='danger';
        }
        $.notify({
            icon: 'ti-check',
            message: errorNote

        }, {
            type: type,
            timer: 4000
        });
    }
</script>

@if (session('status'))
    <script>
        notice('{{ session('status') }}', 'danger');
    </script>
@endif
@if(isset($errors) && $errors->any())
    @foreach($errors->all() as $error)
        <script>
            notice('<?php echo $error; ?>', 'danger');
        </script>
    @endforeach
@endif

@stack('scripts')
@stack('modals')
</body>
</html>
