<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
    <style>
        .form-container-reg{
            max-width: 100%;
            margin: auto;
        }
        .responsive{
            max-width: 100%;
            height: 100%;
            object-fit: fill;
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
    <div class = "w3-header w3-display-container w3-center w3-padding-32 w3-center">
        <image src="{{ URL::to('/assets/images/Header.jpg') }}" class="responsive" >
    </div>
   
    <div class="w3-container w3-margin form-container-reg">
        <div class="w3-card-4">
            <a href= "{{ url('landing_page') }}" class="w3-btn w3-round w3-black w3-bar-block w3-left" name="back">Back</a>
            <div class="w3-container w3-pink w3-center">
                <p class ="w3-cursive">
                    Register New Account
                </p>
            </div>
            <div class = "w3-container w3-padding ">
                <form  action="{{ route('register.post') }}" method="get" accept-charset="UTF-8" >
                {{csrf_field()}}
                    <p>
                        <label>Full Name</label>
                        <input class="w3-input w3-border w3-round " name="name" id="name" type="name"  placeholder="Please Enter Your Full Name" required>
                    </p>
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <p>
                        <label>Email</label>
                        <input class="w3-input w3-border w3-round" name="email" id="email" type="email"  placeholder="Please Enter Your Email" required>
                    </p>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <p>
                        <label>Phone Number</label>
                        <input class="w3-input w3-border w3-round" name="phone" id="phone" type="phone"  placeholder="Please Enter Your Phone Number" required>
                    </p>
                    @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                    <p>
                        <label>Address</label>
                        <textarea class="w3-input w3-border" id="address" type = "address" name="address" rows="4" cols="50" width="100%" placeholder="Please Enter Your Address" required></textarea>
                    </p>
                    @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                    <p>
                        <label>State</label>
                        <input class="w3-input w3-border w3-round" name="state" id="state" type="state" placeholder="Please Enter Your State" required>
                    </p>
                    @if ($errors->has('state'))
                    <span class="text-danger">{{ $errors->first('state') }}</span>
                    @endif
                    <p>
                        <label>Password</label>
                        <input class="w3-input w3-border w3-round" name="password" id="password" type="password" placeholder="Please Create A Password" required>
                    </p>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="row">
                        <button class="w3-button w3-black w3-round">Register</button>
                    </div>
            </form>

            </div>
            
        </div>
    </div>
    <footer class="w3-footer w3-center w3-bottom w3-pink w3-cursive">MyTutor</footer>
</body>

</html>
