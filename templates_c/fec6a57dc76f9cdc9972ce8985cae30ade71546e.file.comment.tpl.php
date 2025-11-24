<?php /* Smarty version Smarty-3.0.8, created on 2011-09-04 21:35:57
         compiled from "comment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3211725354e63d31d32d432-38318254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fec6a57dc76f9cdc9972ce8985cae30ade71546e' => 
    array (
      0 => 'comment.tpl',
      1 => 1315164949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3211725354e63d31d32d432-38318254',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h2>Hozzászólások</h2>
<?php if ($_smarty_tpl->getVariable('comments_count')->value<=0){?>
	<p>Nincs hozzászólás.</p>
	
<?php }else{ ?>
	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['name'] = 'idx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('comments')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total']);
?>

		<b><?php echo $_smarty_tpl->getVariable('comments')->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['username'];?>
</b> <br/>
		<?php echo $_smarty_tpl->getVariable('comments')->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['time'];?>
 <br/>
		<?php echo $_smarty_tpl->getVariable('comments')->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['comment'];?>
 <hr/>

	<?php endfor; endif; ?>
<?php }?>

<form name="myform" method="post">
	<p>
		Név:
		<input type="text" name="username" value="<?php echo $_smarty_tpl->getVariable('username')->value;?>
" />
		<br/>
		<textarea name="comment" rows="7" cols="50"></textarea>
		<br/>
		<input type="button" value="Küld" onClick="JavaScript:changePage('comment.php?bicycle='+page+'&username='+myform.username.value+'&comment='+myform.comment.value,'Comment');"/>
	</p>
</form>