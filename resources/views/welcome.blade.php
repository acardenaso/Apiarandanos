<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de gestion</title>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: 9px;
    border-bottom-left-radius: 1;
    border-bottom-right-radius: 1;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 1;
    border-top-right-radius: 1;
}
.account-wall
{
    margin-top: 80px;
    padding: 40px 0px 20px 0px;
    background-color: #ffffff;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 4px 3px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 240px;
    height: 170px;
    margin: 0 auto 20px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 30%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}



.buttonn {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.buttonn:hover {
  color:#FFFFFF;
	background-color:#64994c;
}
.buttonn:active {
	position:relative;
	top:1px;
}

.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}

.fondo{
background-image: url(img/bg.jpg);
}
/*=== 8. Custom Checkbox & Radio ===*/
/* Base for label styling */
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked,
[type="radio"]:not(:checked),
[type="radio"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label,
[type="radio"]:not(:checked) + label,
[type="radio"]:checked + label {
  position: relative;
  padding-left: 25px;
  padding-top: 1px;
  cursor: pointer;
}
/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before,
[type="radio"]:not(:checked) + label:before,
[type="radio"]:checked + label:before {
  content: '';
  position: absolute;
  left: 0;
  top: 2px;
  width: 21px;
  height: 21px;
  border: 0px solid #aaa;
  background: #f0f0f0;
  border-radius: 3px;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3);
}
/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after,
[type="radio"]:not(:checked) + label:after,
[type="radio"]:checked + label:after {
  position: absolute;
  color: #555555;
  transition: all .2s;
}
/* checked mark aspect changes */
[type="checkbox"]:not(:checked) + label:after,
[type="radio"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
[type="checkbox"]:checked + label:after,
[type="radio"]:checked + label:after {
  opacity: 1;
  transform: scale(1);
}
/* disabled checkbox */
[type="checkbox"]:disabled:not(:checked) + label:before,
[type="checkbox"]:disabled:checked + label:before,
[type="radio"]:disabled:not(:checked) + label:before,
[type="radio"]:disabled:checked + label:before {
  box-shadow: none;
  border-color: #8c8c8c;
  background-color: #878787;
}
[type="checkbox"]:disabled:checked + label:after,
[type="radio"]:disabled:checked + label:after {
  color: #555555;
}
[type="checkbox"]:disabled + label,
[type="radio"]:disabled + label {
  color: #8c8c8c;
}
/* accessibility */
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before,
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before {
  border: 1px dotted #f6f6f6;
}
/* hover style just for information */
label:hover:before {
  border: 1px solid #f6f6f6 !important;
}
/*=== Customization ===*/
/* radio aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  border-radius: 3px;
}
[type="radio"]:not(:checked) + label:before,
[type="radio"]:checked + label:before {
  border-radius: 35px;
}
/* selected mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '✔';
  top: 0;
  left: 2px;
  font-size: 19px;
}
[type="radio"]:not(:checked) + label:after,
[type="radio"]:checked + label:after {
  content: '\2022';
  top: 0;
  left: 3px;
  font-size: 30px;
  line-height: 25px;
}
    </style>

    </head>
    <body class="fondo">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                       <center><a class="fa fa-bug" href="{{ url('/home') }}">Estas logeado, click aqui para Redireccionar al sistema</a></center>
                    @else
                    @endauth
                </div>
            @endif
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          
            <div class="account-wall">
                <img class="profile-img" src="{{asset('img/la.png')}}">



                    
            <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingrese su Correo" required autofocus>
                     @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif 
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">           
                <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese su Contraseña" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
       
        </div>
        <div class="form-check">
    <input type="checkbox" class="form-check-input" name="remember" id="remember">
    <label class="form-check-label" for="remember">recordarme</label>
  </div> <br>
                <button style="border-radius: 13px;" class="buttonn" type="submit">
                    Iniciar Sesion </button>
                </form>





            </div>
          
        </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $("#remember").change(function(){
                var isChecked = $(this).prop("checked");
                if(isChecked){
                    var email = $("#email").val();
                    localStorage.setItem("email",email);
                }else{
                    localStorage.setItem("email","");
                }
            })
            window.addEventListener("load",function(){
                var remember = localStorage.getItem("email");
                if(remember){
                    $("#remember").prop("checked",true)
                    $("#email").val(remember)
                }
            })
        })
    </script>
    </body>
</html>
