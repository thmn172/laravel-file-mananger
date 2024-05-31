@extends('demo')
@section('test')
<div class="all">
    <div class = "wrapper">
                <form action="{{route('login')}}" method="post">
                @csrf
                <h3>LOGIN <?php echo date('d/m/Y-H:i:s')?></h3>
                <div class="form-group">
                    <input type="text" name="txttendn" placeholder = "Username..." >
                </div>
               
                    <input class="btnDN" type="submit" value="LOGIN" name="btnDN">
                </div>
                <footer>
                    <a href="">forgot the password?</a>
                </footer>
            </form>
        </div>
    </div>
@endsection
@section('header')
@parent
    <h2>anh minh hải triều</h2>
@endsection