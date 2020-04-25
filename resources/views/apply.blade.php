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
				top: 50%;
			}
		}
		.ApplyPage{
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
        .Experience{
			margin-top: 5px;
    		padding-top: 5px;
    		padding-bottom: 50px;
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

	</style>

</head>

<body style="background-color:#FFFFB5;margin:0;font-family: '微軟正黑體'";>
	
	<div class = "ApplyPage">
		<img src = "../static/apply.png";
    	style = " display: block;
    	max-width: 50%;
    	margin: auto;
    	margin-bottom: 10px;"/>
    	<input type="text" class="Input" placeholder="最高學歷學校名稱" name="highestEducation">
    	<input type="text" class="Input" placeholder="科系(所)" name="department">
        <input type="password" class="Experience" placeholder="相關教學經驗(請上傳相關證照或教學檔案)" name="experience">
        <form>
            <input type="file" name="file" value="選擇檔案">
            <input type="submit" name="submit" value="上傳檔案">
        </form>

    	<div class="option">
    		<div class="OptionButton" id="apply">提出申請</div>
    		<div class="OptionButton" id="close" onclick="location.href='{{route('login_home')}}';">關閉</div>
    	</div>

	</div>


</body>
</html>