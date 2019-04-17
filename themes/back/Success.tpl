{if isset($succes) && $nbsucces>0}
	<div class="alert alert-card alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{foreach from=$succes item="succe"}
			{$succe}<br />
		{/foreach}
	</div>
{/if}