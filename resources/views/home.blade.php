@extends(layout())

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('auth.dashbord')}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{trans('auth.you-are-loggerd in')}}<!doctype html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport"
                                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                            <meta http-equiv="X-UA-Compatible" content="ie=edge">
                            <title>Document</title>
                        </head>
                        <body>
                        @if(isAdmin())
                        <div class="panel-body panel-heading">
                            <label class="label-info">Área Administrativa</label>
                        </div>
                        @endif
                        </body>
                        </html>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
