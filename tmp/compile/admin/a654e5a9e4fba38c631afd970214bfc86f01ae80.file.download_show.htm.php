<?php /* Smarty version Smarty-3.1.12, created on 2017-05-17 16:22:42
         compiled from ".\tpl\admin\download_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:29658591c06b80b4013-63601192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a654e5a9e4fba38c631afd970214bfc86f01ae80' => 
    array (
      0 => '.\\tpl\\admin\\download_show.htm',
      1 => 1495009343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29658591c06b80b4013-63601192',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_591c06b80b4012_46822932',
  'variables' => 
  array (
    'mobile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591c06b80b4012_46822932')) {function content_591c06b80b4012_46822932($_smarty_tpl) {?><style>
#tip {
    background: url(./themes/img/app-open.png) no-repeat center top;
    width:95%;
	height:60%;
	margin:0 auto;
    background-size: 90% 100%;
	
}
body{width:100%;height:100%;}
</style>
<head>
<title>微信扫码下载</title>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['mobile']->value=="az"){?>
<div id="tip"></div>
<?php }elseif($_smarty_tpl->tpl_vars['mobile']->value=="ios"){?>
<div id="tip"></div>
<?php }elseif($_smarty_tpl->tpl_vars['mobile']->value=="iosdown"){?>
  <div>因苹果审核机制，目前暂时不提供下载</div>
<?php }?>
</body><?php }} ?>