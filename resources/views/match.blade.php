<!DOCTYPE html>
<html>

<head>
	<title>SEContact</title>
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
		.MatchPage{
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

		.option{
			overflow: auto;
    		margin-top: 15px;
    		display:block;
		}

		.OptionButton{
			padding: 10px 20px;
    		border-radius: 2px;
    		margin-left: 10px;
    		position: relative;
    		display: inline-block;
		    top: 0;
		    left: 0;
		    margin: 5px 5px;
		    background-color: #FFFFC9;
		    box-shadow: -2px 2px 3px 1px #F0F000;
		    font-size: 100%;
		    cursor: pointer;
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

		input{
			border:none;
			font-family: '微軟正黑體';
		}

	</style>

</head>

<body style="background-color:#FFFFB5;margin:0;font-family: '微軟正黑體'";>

	<div class = "MatchPage">
		<img src = "../static/match.png";
    	style = " display: block;
    	max-width: 60%;
    	margin: auto;
			margin-bottom: 10px;"/>
			<form method="post" action={{route('match_store')}} enctype="multipart/form-data">
				@csrf
    		<input type="text" class="Input" placeholder="想要交換的技能" name="want_to_exchange" value={{$matches->want_to_exchange}}>
    		<input type="text" class="Input" placeholder="可以交換的技能" name="able_to_exchange" value={{$matches->able_to_exchange}}>
    		<textarea class="Context" placeholder="簡短的自我介紹" name="self_introduction">{{$matches->self_introduction}}</textarea>
    		<input type="submit" class="OptionButton" id="send" value="送出">
				<div class="OptionButton" id="cancel"  onclick="window.history.back()">取消</div>
			</form>

	</div>


</body>
</html>