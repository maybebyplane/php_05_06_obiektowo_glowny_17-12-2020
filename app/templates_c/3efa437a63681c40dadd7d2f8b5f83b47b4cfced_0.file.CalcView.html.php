<?php
/* Smarty version 3.1.30, created on 2020-12-17 20:17:41
  from "D:\PULPIT\STUDIA\V SEMESTR 2020-2021\(AS) APLIKACJE SIECIOWE\XAMP\htdocs\php_05_06_obiektowo_glowny\app\calc\CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fdbbce50770c5_74441080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3efa437a63681c40dadd7d2f8b5f83b47b4cfced' => 
    array (
      0 => 'D:\\PULPIT\\STUDIA\\V SEMESTR 2020-2021\\(AS) APLIKACJE SIECIOWE\\XAMP\\htdocs\\php_05_06_obiektowo_glowny\\app\\calc\\CalcView.html',
      1 => 1608235198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdbbce50770c5_74441080 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9333611865fdbbce5068967_20761955', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14822601845fdbbce50764c0_75194644', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender(($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'footer'} */
class Block_9333611865fdbbce5068967_20761955 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_14822601845fdbbce50764c0_75194644 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Kalkulator kredytowy</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
		<fieldset>

			<label for="kwota">Kwota kredytu [PLN]</label>
			<input id="kwota" type="number" placeholder="Kwota kredytu [PLN]" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
">
					
			<label for="lat">Kredyt na [lat]</label>
			<input id="lat" type="number" placeholder="Kredyt na [lat]" name="lat" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lat;?>
">

            <label for="oprocentowanie">Oprocentowanie [%]</label>
			<input id="op" type="number" placeholder="Oprocentowanie [%]" name="op" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
">
                        
			<button type="submit" class="pure-button">Wylicz</button>
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

        zł miesięcznie
	</p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
