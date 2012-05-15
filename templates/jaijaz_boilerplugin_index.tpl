{if $items}
  {foreach $items i name="item"}
    <div class="listitems">
      {if $.image}<a href="{$i.url}" rel="nofollow" class="left"><img src="images/w100/tablenames/{$i.image}" alt="{$i.name}"/></a>{/if}
      <div class="item right">
        <div class="right">
          <p>${$i.price}</p>
        </div>
        <a href="{$i.url}"><h3>{$i.name}</h3></a>
        <a href="{$i.url}" rel="nofollow">more details</p>
      </div>
    </div>
  {/foreach}
{else}
  <p>Select from one of the following Categories</p>
  {foreach $catlist c name="cat"}
    <a class="cat" href="tablename/{$c.caturl}"}>{$c.name|capitalize}</a>
  {/foreach}
{/if}