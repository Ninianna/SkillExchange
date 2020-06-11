<!DOCTYPE html>
<html>

<head>
	<title>SELogin</title>
	<style>
		@keyframes slideUp{
			from{
				opacity: 0;
				top: 100%;
			}
			to{
				opacity: 1;
				top: 45%;
			}
		}
		.AddPage{
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
			font-family: '微軟正黑體';
		}

		.OptionButton:active{
			padding: 10px 20px;
    		border-radius: 2px;
    		margin-left: 10px;
    		position: relative\;
    		display: inline-block;
		    top: 0;
		    left: 0;
		    margin: 5px 5px;
		    background-color: #FFFFC9;
		    box-shadow: -2px 2px 3px 1px white;
		    font-size: 100%;
			cursor: pointer;
			font-family: '微軟正黑體';
		}
    .Context{
			margin-top: 5px;
    		padding-top: 5px;
    		padding-bottom: 70px;
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
			font-size: 90%;
			font-family: '微軟正黑體';
		}

		input{
			border:none;
			font-family: '微軟正黑體';
		}

	</style>

</head>

<body style="background-color:#FFFFB5;margin:0;font-family: '微軟正黑體'";>

	<div class = "AddPage">
		<img src = "../static/add.png";
    	style = " display: block;
    	max-width: 90%;
    	margin: auto;
			margin-bottom: 10px;"/>
		<form method="POST" action={{route('article_delete')}}>
			@csrf
				<input type="hidden" id="article_id" name="delete" value="送出">
    		<input type="text" class="Input" placeholder="標題" name="title" value={{$articles->title}}>
				<textarea class="Context" placeholder="內容" name="context">{{$articles->content}}</textarea>
    		<input type="submit" class="OptionButton" id="upload" value="修改">
    		<div class="OptionButton" id="close" onclick="window.history.back()">關閉</div>
		</form>

	</div>


</body>
</html>