<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>MainPage</title>
    <style>
        @media screen and (max-width: 768px) {
            .w3-container {
                width: 100%;
            }
        }

        @media screen and (min-width: 768px) {
            .w3-container {
                width: 700px;
                margin: 0 auto;
            }
        }
        table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        }

        th, td {
        text-align: left;
        padding: 8px;
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

    <header class="w3-center w3-padding-large w3-pink w3-cursive">
        <a href= "{{ url('landing_page') }}"class="w3-btn w3-round w3-black w3-bar-block w3-left w3-cursive" name="submit">Logout</a>
        <h2>Subject List</h2>
    </header>
    <div>
        <button class="w3-button w3-round w3-right w3-pink w3-margin w3-cursive" onclick="document.getElementById('newsubject').style.display= 'block';return false;">New Subject</button>
    </div>

    <div class="w3-padding" style='overflow-x:auto;'>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <th>No</th>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Subject Description</th>
                <th>Subject Price</th>
                <th>Subject Learning Hours</th>
                <th>Operations</th>
            </thead>
            @foreach ($listSubject as $listItem)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $listItem->subject_id}}</td>
                <td>{{ $listItem->subject_title}}</td>
                <td>{{ $listItem->subject_description}}</td>
                <td>{{ $listItem->subject_price}}</td>
                <td>{{ $listItem->subject_learningHours}}</td>
                <td>
                    <div class="w3-cell">
                        <form method="post" action="{{route('markDelete',$listItem->subject_id)}}" accept-charset="UTF-8" onsubmit="return confirm('Delete?');">
                            {{csrf_field()}}
                            <button class="w3-button w3-round w3-block" type="submit">
                                <i class="fa fa-trash"> </i></button>
                        </form>
                    </div>
                    <div class="w3-cell">
                        <button class="w3-button w3-round w3-block" onclick="document.getElementById('{{$loop->iteration}}').style.display='block';return false;"><i class="fa fa-pencil-square-o"> </i>
                        </button>
                    </div>
                    <div id="{{$loop->iteration}}" class="w3-modal w3-animate-opacity">
                        <div class="w3-modal-content w3-round" style="width:500px">
                            <header class="w3-row w3-blue"> <span onclick="document.getElementById('{{$loop->iteration}}').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                                <h4 class="w3-margin-left">Update Subject Registeration Form</h4>
                            </header>
                            <div class="w3-padding">
                                <form method="post" action="{{route('markUpdate',$listItem->subject_id)}}">
                                    {{csrf_field()}}
                                    <p><input class="w3-input w3-round w3-border" type="text" name="subtitle" placeholder="Title Subject" value ="{{ $listItem->subject_title}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="text" name="subdesc" placeholder="Subject Description" value ="{{ $listItem->subject_description}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="number" name="subprice" placeholder="Subject Price" step="any" value ="{{ $listItem->subject_price}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="number" name="sublearnhours" placeholder="Subject Learning Hours" value ="{{ $listItem->subject_learningHours}}"></p>
                                    </textarea></p>
                                    <button class="w3-button w3-blue w3-round" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
        </table>
    </div>
   

    <div id="newsubject" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content w3-round" style="width:500px">
            <header class="w3-row w3-pink"> <span onclick="document.getElementById
     ('newsubject').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                <h4 class="w3-margin-left">New Subject Registeration Form</h4>
            </header>
            <div class="w3-padding">
                <form method="post" action="{{route('saveSubject')}}">
                    {{csrf_field()}}
                    <p><input class="w3-input w3-round w3-border" type="text" name="subtitle" placeholder="Subject Title"></p>
                    <p><input class="w3-input w3-round w3-border" type="text" name="subdesc" placeholder="Subject Description"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="subprice" placeholder="Subject Price" step="any"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="sublearnhours" placeholder="Subject Learning Hours"></p>
                    </textarea></p>
                    <button class="w3-button w3-black w3-round" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
<footer class="w3-footer w3-center w3-pink">MyTutor</footer>

</html>