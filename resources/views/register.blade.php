<!DOCTYPE html>
<html>

<head>
	<title>SELogin</title>
	<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
	<style>
		@keyframes slideUp{
			from{
				opacity: 0;
				top: 100%;
			}
			to{
				opacity: 1;
				top: 50%;
			}
		}
		.RegisterPage{
			background-color:white;
			max-width:400px;
			position: fixed;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    border-radius: 10px;
		    text-align: center;
		    padding: 10px 20px 30px 20px;
		    z-index: 100;
		    animation: slideUp 1s ease 0s 1 normal both;
		    width: 80%;
		    font-size: 100%;
/*		    box-shadow: -10px 10px 20px 1px #F0F000;*/
		}

		.Input{
			margin-top: 5px;
    		padding-top: 5px;
    		padding-bottom: 5px;
    		padding-left: 10px;
    		font-size: 90%;
    		background-color: white;
    		border-radius: 5px;
    		border-style: solid;
    		border-color: #D9D9D9;
    		border-width: 1px;
    		width: 80%;
			box-sizing: border-box;
			text-align: left;
		}

		.OptionButton{
			padding: 10px 20px;
    		border-radius: 2px;
    		margin-left: 10px;
    		position: relative;
    		display: inline-block;
		    top: 0;
		    left: 0;
		    margin: 15px 5px;
		    background-color: #FFFFC9;
		    box-shadow: -2px 2px 3px 1px #F0F000;
		    font-size: 100%;
			cursor: pointer;
			font-family: "微軟正黑體";
		}

		.OptionButton:active{
			padding: 10px 20px;
    		border-radius: 2px;
    		margin-left: 10px;
    		position: relative;
    		display: inline-block;
		    top: 0;
		    left: 0;
		    margin: 5px 5px;
		    background-color: #FFFFC9;
		    box-shadow: -2px 2px 3px 1px white;
		    font-size: 100%;
		    cursor: pointer;			
		}



	</style>

</head>

<body style="background-color:#FFFFB5;margin:0;font-family: '微軟正黑體'";>
	
	<div class = "RegisterPage">
		<img src = "../static/register.png";
    	style = " display: block;
    	max-width: 50%;
    	margin: auto;
		margin-bottom: 10px;"/>

		@if(count($errors)>0)
			@foreach($errors->all() as $value)
				<div style="color:red; font-size:12px; font-family:serif">{{$value}}</div>
			@endforeach
		@endif

		@csrf
		<form method="POST">
    		<input type="text" class="Input" placeholder="姓名" name="name" value="{{old('name')}}">
    		<input type="text" class="Input" placeholder="電子信箱" name="email" value="{{old('email')}}">
    		<input type="password" class="Input" placeholder="密碼" name="password">
    		<select class="Input" id="edu" name="edu">
    			<option value="" disabled selected>--請選擇學歷--</option>
    			<option value="1" {{old('edu')==1 ?'selected':''}} e_name="Master">碩博士</option>
    			<option value="2" {{old('edu')==2 ?'selected':''}} e_name="Bachelor">大專院校</option>
    			<option value="3" {{old('edu')==3 ?'selected':''}} e_name="HighSchool">高中職</option>
    			<option value="4" {{old('edu')==4 ?'selected':''}} e_name="JuniorHigh">國中</option>
    			<option value="5" {{old('edu')==5 ?'selected':''}} e_name="Elementary">國小</option>
    			<option value="6" {{old('edu')==6 ?'selected':''}} e_name="BelowElementary">國小以下</option>
			</select>
			<input type='hidden' id="education" name="education" value=""/>
			@csrf
			<input type="submit" class="OptionButton" id="register" onclick="location.href='{{route('registration')}}';" value="註冊">
    		<div class="OptionButton" id="already" onclick="location.href='{{route('login')}}';">已有帳號</div>
			<div class="OptionButton" id="close" onclick="location.href='{{route('home')}}';">關閉</div>
			<script type="text/javascript" language="javascript">
				$(function() {
					$("#edu").change(function(){
						var educ= $('option:selected', this).attr('e_name');
						$('#education').val(educ);
				 	});
			  	});
			</script>	

		</form>

	</div>


</body>
</html>