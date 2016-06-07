<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Registration Page</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/dist/css/AdminLTE.min.css')}}">

        <link rel="stylesheet" href="{{asset('/plugins/iCheck/square/blue.css')}}">
        <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
        <script src="{{asset('/js/jquery-2.2.2.min.js')}}"></script>
        <script src="{{asset('/js/Validations.js')}}"></script>
    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="#"><b>Admin</b>LTE</a>
            </div>

            @if(isset($message))
            <div class="alert alert-info">{{$message}}</div>
            @endif

            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="#" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Full name" id="Full_name" name="FullName">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="error" id="Fullname_error"></span>

                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Last name" id="LastName" name="LastName">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="error" id="LastName_error"></span>

                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="male">Male</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="female" required>Female</label>
                    </div>
                  
                    <div class='form-group has-feedback'>
                        <input type="email" class="form-control" placeholder="Email" id="Email" name="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span class="error" id="Email_error"></span>
                    </div>
                     <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="Password" id="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="error" id="PasswordError"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Confirm Password"  id="Confirm"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="error" id="confirmError"></span>
        </div>

                    <div class="row">

                        <div class="col-xs-4">
                            <button type="submit" id="next" class="btn btn-primary btn-block btn-flat">Registry</button>
                        </div>
                        
                    </div>
                </form>


            </div>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>

    </script>
</body>
</html>