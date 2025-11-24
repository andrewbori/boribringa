{* Keszitette: Bori Andras
 * A kommentek lekerdezesehez es megjelenitesehez tartozo sablon
 *}
<h2>Hozzászólások</h2>

{* 
 * Talalatok megjelenitese
 *}
{* Ha nincs talalat, szoveg *}
{if $comments_count<=0}
	<p>Nincs hozzászólás.</p>
	
{* Egyebkent talalatok megjelenitese *}
{else}
	{* ciklus a talalatok megjelenitesere *}
	{section name=idx loop=$comments}

		<b>{$comments[idx]['username']}</b> <br/>
		{$comments[idx]['time']} <br/>
		{$comments[idx]['comment']} <hr/>

	{/section}
{/if}

<form name="myform" method="post">
{* Uj komment *}
	<p>
		Név:
		<input type="text" name="username" value="{$username}" />
		<br/>
		<textarea name="comment" rows="7" cols="50"></textarea>
		<br/>
		<input type="button" value="Küld" onClick="JavaScript:changePage('comment.php?bicycle='+page+'&username='+myform.username.value+'&comment='+myform.comment.value,'Comment');"/>
	</p>
</form>