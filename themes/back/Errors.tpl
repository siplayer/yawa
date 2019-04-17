{if isset($errors) && $nberrors>0}
	<div class="alert alert-card alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{foreach from=$errors item="error"}
			{$error}<br />
		{/foreach}
	</div>
{/if}