<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{ URL::asset('css/login_page.css') }}" />
        <script type="text/javascript" src="{{ URL::asset('js/login_page.js') }}"></script>

        <!-- Styles -->

        <style>
            @media screen and (max-width: 768px){
                .w3-container{
                    width: 100%;
                }
            }
            @media screen and (min-width: 768px){
                .w3-container{
                    width: 700px;
                    margin: 0 auto;
                }
            }
        </style>
    </head>
    <body>
        @if (session('save'))
        <script>
            alert("Success");
        </script>
        @endif
        @if (session('error'))
        <script>
            alert("Failed");
        </script>
        @endif
        <div class="main-container">
        <div id="log-in" class="left-container log-in">
        <p>
            <a href= "{{ url('landing_page') }}"class="w3-btn w3-round w3-pink w3-bar-block w3-right w3-cursive" name="submit">Back</a>
        </p>
        <h1 class="w3-cursive">Welcome to My Tutor</h1>
        <div style="width: 100%;">
            <form action="{{ route('login.post') }}" class="signup-form" method = "get" accept-charset="UTF-8">
            {{csrf_field()}}
            <input id="email" type="email" placeholder="E-mail" name="email" required>
            @if ($errors->has('email'))
            <span class="w3-red">{{ $errors->first('email') }}</span>
            @endif
            <input id="password" type="password" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
            <span class="w3-red">{{ $errors->first('password') }}</span>
            @endif
            <button class="w3-button w3-pink w3-round">Login</button>
            </form>
        </div>
        </div>

        <div class="right-container"></div>
        </div>
        <footer class="w3-footer w3-center w3-bottom w3-pink w3-cursive">MyTutor</footer>

</body>
</html>
