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
		.ArticleView{
			background-color: #fffff0;
			margin-top: 70px;
			margin-left: 30px;
			margin-right: 30px;
			height: auto;
			overflow: auto;
		}

		table {
  		border: 0;
  		font-family:'微軟正黑體';
  		font-size:20px;
			width:96%;
			border-collpase:separate;
		}
		th {
  		background-color:#FFF0D4;
		}
		td {
			border-bottom:1 solid #000000;
			text-align: center;
		}
		.fail {
  		color:#FF0000;
		}

	</style>


</head>

<body style="background-color:#FFFFB5;margin:0;font-family: 'Comic Sans MS','微軟正黑體'";>
	<div id="header" style="background-color:#FFFFF2;">


		<img src="../static/title1.png" class="HeaderImage" onclick="location.href='{{route('home')}}';"/>

    	<div class="loginHolder">

    			<div class="Button" id ="login" onclick="location.href='{{route('login')}}';">登入</div>
    			<div class="Button" id="Register" onclick="location.href='{{route('register')}}';">註冊</div>
    			<div class="Button" id="Contact" onclick="location.href='{{route('contact')}}';">聯絡我們</div>

    	</div>

	</div>

	<div>
		<div id="Search">
			<input type="text" class="SearchInput" placeholder="關鍵字搜尋" name="search">
		</div>
	</div>
	<div id="article" class="ArticleView">
		<div style="color: #FFFFF2;">ABCD</div>

		@if (isset($articles))
			<ol>
				<table>
					<tr>
						<th>標題</th>
						<th>內容摘要</th>
						<th>發布者</th>
					</tr>

					@foreach ($articles as $article)
					<tr>
						<td>{{$article->title}}</td>
						<td>{{$article->content}}</td>
							@if ($article->user->teaching_verified == true)
								<td style="color:#FF8282;">
									{{$article->user->name}}
								</td>
							@else
								<td>
									{{$article->user->name}}
								</td>
							@endif
					</tr>
					@endforeach
				</table>
			</ol>
		@endif
	</div>

</body>
</html>