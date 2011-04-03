<?php
class js {
	public function __construct() {
		
	}
	public function index() {
		include template('header.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Javascript在线解压缩 - iNote</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
	<style>
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td { 
	margin:0;
	padding:0;
}
table {
	border-collapse:collapse;
	border-spacing:0;
}
fieldset,img { 
	border:0;
}

ol,ul {
	list-style:none;
}
caption,th {
	text-align:left;
}
h1,h2,h3,h4,h5,h6 {
	font-size:100%;
	font-weight:normal;
}
q:before,q:after {
	content:'';
}
abbr,acronym { border:0;
}
textarea,button,input {outline: none;}

.clearfix:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}
 
.clearfix {
	display: inline-block;
}
 
html[xmlns] .clearfix {
	display: block;
}
 
* html .clearfix {
	height: 1%;
}

	
	body {background: #eee;font: 12px/1.5 "Lucida Grande", "Microsoft YaHei", Verdana;;}
	input,textarea {border: 1px solid;border-color: #707070 #CECECE #CECECE #707070;}
	button {border: 1px solid;border-color: #C2D5E3 #369 #369 #C2D5E3;color: #369;background: #E5EDF2;padding: 6px 15px;font-size: 14px;vertical-align: middle;margin-right:10px;overflow:hidden;}
	a {color: #333;}
	#wrapper {width: 790px;margin: 15px auto;border: #E5E5E5 3px solid;background: #FFF;padding: 15px;overflow: hidden;}
	#header {border-bottom: 1px solid #E5E5E5;}

	#logo {font-size:24px;font-weight: 700;font-family: 'Trajan Pro';}
	#logo a{
		color: #000;
	}
	#nav {line-height: 26px;height: 26px;overflow: hidden;margin-left:140px;}
	#nav li {float: left;margin-right: 6px;}
	#nav li a {float: left;border: 1px solid #E5E5E5;background: #FFF;border-bottom: none;padding: 0 12px;text-decoration: none;}
	
	#square {display: none;}
	#square h1{font-size: 18px;font-weight: 700;font-family: 'Trajan Pro';}
	
	#content p{
		margin: 10px 0;
	}
	#code {width:590px;}
	
	#mainarea {float: left;width: 598px;}
	
	#sidearea {float: right;width: 160px; border-left: 1px solid #E5E5E5;padding: 0 10px;}
	
	#footer {border-top: 1px solid #E5E5E5}
	#footer p{padding-top:10px;text-align:center;}
	
	.code {font-family: Consolas,"Courier New",Courier,monospace;}
	.loading {background: url(loading.gif) 50% 50% no-repeat;}
	</style>
	
<script src="http://localhost/slim/static/js/jquery-1.4.4.min.js"></script>
<script>
function js_do(operate) {
	var textarea = $('#code'), code = textarea.val();
	if(operate == 'unpack'){
		if(code.indexOf('eval') == 0){
			try {
                eval("code = String" + code.slice(4) + ';');
            } catch (error) {
                alert('-。-、呃呃，貌似解压出错了！');
            }
		}
		operate = 'beauty';
	}
	code = code.replace(/%/g, "%25");
	code = code.replace(/\&/g, "%26");
	code = code.replace(/\+/g, "%2B");
	$.ajax({
		type: 'POST',
		url: 'http://localhost/oo/js/ajax.html',
		beforeSend: function(){
			textarea.addClass('loading');
		},
		complete: function(){
			textarea.removeClass('loading');
		},
		data: 'code=' + code + '&operate=' + operate,
		dataType: 'json',
		success: function(data) {
			textarea.val(data.text);
			//textarea.val(data);
		}
	});
}
</script>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<h2 id="logo"><a href="http://box.inote.cc/">iNote</a></h2>
			<p>beta 0.1a</p>
			<ul id="nav">
				<li class="current"><a rel="noflow" href="http://box.inote.cc/">首页</a></li>
				<li><a href="#">Javascript工具</a></li>
			</ul>
		</div>
		<div id="square">
			<h1>Javascript <u>De</u>code & <u>En</u>code</h1>
			<p>您可以对javascript进行 美化、净化、压缩、解压</p>
		</div>
		<div id="content" class="clearfix">
			<div id="mainarea">
				<p>
					<textarea id="code" class="code" name="code" rows="20" cols="30">/*   美化：格式化代码，使之容易阅读			*/
/*   净化：去掉代码中多余的注释、换行、空格等	*/
/*   压缩：将代码压缩为更小体积，便于传输		*/
/*   解压：将压缩后的代码转换为人可以阅读的格式	*/

/*   如果有用，请别忘了推荐给你的朋友：		*/
/*   javascript在线美化、净化、压缩、解压：http://box.inote.cc/   */

/*   以下是演示代码				*/

    var getPositionLite = function(el) {        var x = 0,        y = 0;        while (el) {            x += el.offsetLeft || 0;            y += el.offsetTop || 0;            el = el.offsetParent        }        return {            x: x,            y: y        }    };
/*   更新记录：					*/
    var history = {
    	'v1.0':	['2011-01-18','javascript工具上线']
    };</textarea>
				</p>
				<p>
					<button onclick="js_do('beauty');">美化</button>
					<button onclick="js_do('optimize');">净化</button>
					<button onclick="js_do('pack');">压缩</button>
					<button onclick="js_do('unpack');">解压</button>
				</p>
			</div>
			<div id="sidearea">
				<p>分享到微博</p>
			</div>
		</div>
		<div id="footer">
			<p><script src="http://s5.cnzz.com/stat.php?id=2807263&web_id=2807263&show=pic" language="JavaScript"></script><br />Created by <a href="http://inote.cc">XiaoZi</a></p>
		</div>
	</div>
	<div id="process"></div>
</body>
</html>
<?php
	}
	
	public function ajax() {
		$code = Slim::request()->post('code');
		$operate = Slim::request()->post('operate');
		$result = array('status' => false, 'message' => '', 'text' => '');
		
		include 'lib/beautify.php';
		include 'lib/packer.php';
		if(!is_null($code)) {
			$operate = in_array($operate,array('beauty','optimize','pack')) ? $operate : 'beauty';	
			switch ($operate) {
				case 'beauty':
					$code = js_beautify($code);
					break;
				case 'optimize':
					$packer = new JavaScriptPacker($code, 0);
					$code = $packer->pack();
					break;
				case 'pack':
					$packer = new JavaScriptPacker($code, 62);
					$code = $packer->pack();
					break;
				default:
				
			}
			$result['text'] = $code;
			$result['status'] = true;
		}
		echo json_encode($result);
	}
}
?>