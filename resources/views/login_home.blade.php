<!DOCTYPE html>
<html>

<head>
	<title>Skill Exchange</title>

	<style>
		
		.loginHolder{
			position: absolute;
    		right: 50px;
    		top: 80px;
		}

		.Button{
			padding: 10px 20px;
    		border-radius: 2px;
    		margin-left: 10px;
    		position: relative;
    		display: inline-block;
		    top: 0;
		    left: 0;
		    margin: 10px 10px;
		    background-color: #FFFFC9;
		    box-shadow: -2px 2px 2px 1px #F0F000;
		    font-size: 100%;
		    cursor: pointer;
			font-weight: bold;
			font-family: "微軟正黑體";
		}
		.Button:active{
			padding: 10px 20px;
    		border-radius: 2px;
    		margin-left: 10px;
    		position: relative;
    		display: inline-block;
		    top: 0;
		    left: 0;
		    margin: 10px 10px;
		    background-color: #FFFFC9;
		    box-shadow: -2px 2px 2px 1px #FFFFF2;
		    font-size: 100%;
		    cursor: pointer;
		}

		.HeaderImage{
			margin-left: 10px;
    		margin-top: 20px;
    		margin-block-end: 20px;
    		width:480px;
    		height:120px;
    		cursor: pointer;
		}

		.SearchInput{
			margin-top: 30px;
			margin-left: 10px;
			margin-right: 30px;
    		padding-top: 5px;
    		padding-bottom: 5px;
    		padding-left: 10px;
    		font-size: 90%;
    		background-color: white;
    		border-radius: 5px;
    		border-style: solid;
    		border-color: #D9D9D9;
    		border-width: 1px;
    		width: 20%;
			box-sizing: border-box;
			text-align: left;
			float: right;
		}


	</style>

</head>

<body style="background-color:#FFFFB5;margin:0;font-family: 'Comic Sans MS','微軟正黑體'";>
	<div id="header" style="background-color:#FFFFF2;">
		

		<img src="../static/title1.png" class="HeaderImage" onclick="location.href='{{route('home')}}';"/>

    	<div class="loginHolder">
			<form action="login_home" method="POST">
				@csrf
				<div class="Button" id ="center" onclick="location.href='{{route('login')}}';">會員中心</div>
				<div class="Button" id="TAregister" onclick="location.href='{{route('apply')}}';">教學註冊</div>
				<div class="Button" id="Contact" onclick="location.href='{{route('contact')}}';">聯絡我們</div>
				<input type="submit" class="Button" id="Logout" onclick="location.href='{{route('logout')}}';" value="登出">
			</form>
    	</div>

	</div>

	<div>
		<div id="Search">
			<input type="text" class="SearchInput" placeholder="關鍵字搜尋" name="search">
		</div>
	</div>

</body>
</html>