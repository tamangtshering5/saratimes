<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>adminPanel</title>

    <!-- Bootstrap core CSS -->

    <link href="{{URL::to('backend/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{URL::to('backend/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('backend/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{URL::to('backend/css/custom.css')}}" rel="stylesheet">
    <link href="{{URL::to('backend/css/icheck/flat/green.css')}}" rel="stylesheet">


    <script src="{{URL::to('backend/js/jquery.min.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#F7F7F7;">

<div id="wrapper">
    <div class="animate form">
        <section class="login_content">
            <form method="post" action="{{route('register_action')}}">

                @if(count($errors)>0)
                    @foreach($errors->all() as $error )
                        <p class=" alert-success">{{$error}}</p>

                    @endforeach
                @endif

                @if(session('success'))
                    <p class="alert alert-success">{{session('success')}}</p>

                @endif
                {{csrf_field()}}
                <h1>Create Account</h1>
                <div>
                    <input type="text" class="form-control" placeholder="Username" required name="name" >
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="Email" required name="email" >
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" required name="password" >
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Confirm Password" required name="password_confirmation">
                </div>
                <div>
                    {{--<input type="submit" class="btn btn-default submit">--}}
                    {{--
                                            <a class="btn btn-default submit" href="index.html">Submit</a>
                    --}}
                    <button type="submit" class="btn btn-default submit">Register</button>
                </div>
                <div class="clearfix"></div>
                <div class="separator">

                    <p class="change_link">Already a member ?
                        <a href="{{route('login')}}" class="to_register"> Log in </a>
                    </p>
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <h1> Ratomatki Cafe!</h1>

                        <p>©2018 All Rights Reserved. Ratomatki Cafe!. Privacy and Terms</p>
                    </div>
                </div>
            </form>
            <!-- form -->
        </section>
        <!-- content -->
    </div>
</div>


</body>
</html>