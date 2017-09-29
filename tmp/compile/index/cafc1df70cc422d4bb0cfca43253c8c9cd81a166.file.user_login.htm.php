<?php /* Smarty version Smarty-3.1.12, created on 2017-09-23 08:18:24
         compiled from ".\tpl\index\user_login.htm" */ ?>
<?php /*%%SmartyHeaderCode:2788959c5a850af3942-01555381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cafc1df70cc422d4bb0cfca43253c8c9cd81a166' => 
    array (
      0 => '.\\tpl\\index\\user_login.htm',
      1 => 1462519102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2788959c5a850af3942-01555381',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c5a850b309d8_67846884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c5a850b309d8_67846884')) {function content_59c5a850b309d8_67846884($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> </title>
<link rel='stylesheet' href='./themes/css/login.css' type='text/css' />
</head>
<body>

<div id="login">
<h1><a href="#" title=""></a></h1> 
<form accept-charset="utf-8" action="?action=user&do=loginok" method="post">
	<p>
		<label>帐号：</label>
		<input class="input" name="username" size="20" type="text" />
	</p>
	<p>
		<label>密码：</label>
		<input class="input" name="password" size="20" type="password" />
	</p>
	<p class="submit">
		<input class="button-primary" name="commit" type="submit" value="登录" />
	</p>
</form>

</div>
</body>
</html>


<?php }} ?>