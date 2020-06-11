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

		.ArticleView{
			background-color: #fffff0;
			margin-top: 70px;
			margin-left: 30px;
			margin-right: 30px;
			height: auto;
			overflow: auto;
		}

		.AddButton{
			padding: 10px 20px;
    		border-radius: 2px;
    		margin-left: 10px;
    		position: relative;
    		display: inline-block;
		    top: 0;
		    left: 0;
		    margin: 12px 15px;
		    background-color: #fffacd;
		    box-shadow: -2px 2px 2px 1px #f0e68c;
		    font-size: 100%;
		    cursor: pointer;
			font-weight: bold;
			font-family: "微軟正黑體";
		}

		.AddButton:active{
			padding: 10px 20px;
    		border-radius: 2px;
    		margin-left: 10px;
    		position: relative;
    		display: inline-block;
		    top: 0;
		    left: 0;
		    margin: 12px 15px;
		    background-color: #fffacd;
		    box-shadow: -2px 2px 2px 1px #fffff0;
		    font-size: 100%;
		    cursor: pointer;
		}

		table {
  		border: 0;
  		font-family:'微軟正黑體';
  		font-size:20px;
			width:96%;
		}
		th{
  		background-color:#FFF0D4;
		}
		td {
  		border-bottom:1 solid #000000;
			text-align: center;
		}
		.fail {
  		color:#FF0000;
		}
		input{
			border:none;
			font-family: '微軟正黑體';
		}
	</style>

</head>

<body style="background-color:#FFFFB5;margin:0;font-family: 'Comic Sans MS','微軟正黑體'";>
	<div id="header" style="background-color:#FFFFF2;">


		<img src="../static/title1.png" class="HeaderImage" onclick="location.href='{{route('home')}}';"/>

    	<div class="loginHolder">
			<form action="login_home" method="POST">
				@csrf
				<div class="Button" id ="center" onclick="location.href='{{route('applyFor')}}';">教學註冊</div>
				<div class="Button" id="contact" onclick="location.href='{{route('contact')}}';">聯絡我們</div>
				<div class="Button" id="return" onclick="location.href='{{route('login_home')}}';">返回首頁</div>
				<input type="submit" class="Button" id="Logout" onclick="location.href='{{route('logout')}}';" value="登出">
			</form>
    	</div>

	</div>

	<div>
		<div id="Search">
			<input type="text" class="SearchInput" placeholder="關鍵字搜尋" name="search">
		</div>
	</div>

	<div id="article" class="ArticleView">
	<div style="color: #000000; margin-left: 40px;padding-top:10px;font-size:40px">歷史文章記錄</div>
			<ol>
				<table>
					<tr>
						<th>標題</th>
						<th>內容摘要</th>
						<th>執行</th>
					</tr>

					@foreach ($articles as $article)
					<tr>
						<td>{{$article->title}}</td>
						<td>{{$article->content}}</td>
						<td>
							<form method="post" action={{route('article_delete')}}>
								@csrf
								<input type="hidden" id="article_id" name="article_id" value="{{$article->id}}">
								<input type="hidden" id="del" name="delete" value="刪除">
								<input type="submit" class="Button" style="font-size:12px;" id="Contact" value="刪除" onClick="return confirm('請確認是否刪除?')"/>
							</form>
							<form method="post" action={{route('article_delete')}}>
								@csrf
								<input type="hidden" id="article_id" name="article_id" value="{{$article->id}}">
								<input type="hidden" id="article_id" name="delete" value="編輯">
								<input type=submit class="Button" style="font-size:12px;" id="Contact" value="編輯">
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			</ol>
  </div>
  <div id="article" class="ArticleView">
		<div style="color: #000000; margin-left: 40px;padding-top:10px;font-size:40px">配對紀錄</div>
		<div class="AddButton" style="margin-left: 40px;" id="article" onclick="location.href='{{route('match')}}';">填寫基本配對資料</div>
		<p style="margin-left: 40px; font-size:15px">*提醒* 需要填寫基本資料系統才能夠幫您配對喔！</p>
    <ol>
      <table>
				<tr>
					<th>配對者</th>
					<th>可交換技能</th>
					<th>欲交換技能</th>
					<th>簡短自我介紹</th>
					<th>執行</th>
				</tr>
					<td>{{$matches->user_name}}</td>
					<td>{{$matches->able_to_exchange}}</td>
					<td>{{$matches->want_to_exchange}}</td>
					<td>{{$matches->self_introduction}}</td>
					<td>
						<div class="Button" style="font-size:13px;" id="Contact">發送邀請</div>
					</td>
			</table>
    </ol>
  </div>
</body>
</html>