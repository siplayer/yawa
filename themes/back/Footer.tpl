{if isset($js_files)}	
	{foreach from=$js_files key=js_uri item=media}
		<script type="text/javascript" src="{$js_uri}" ></script>
	{/foreach}
{/if}
{if $logged==1}
</div>
{/if}
</body>

</html>