<div>
Sort By: <select onchange="OrderSort(this.value);">
    {options}
    <option value="{value}">{text}</option>
    {/options}
</select>
<p><b>Currently sorting by: {ordermethod}</b></p>
Layout: <select onchange="ChangeLayout(this.value);">
    {layoutoptions}
    <option value="{value}">{text}</option>
    {/layoutoptions}
</select>
<p><b>Current Layout: Gallery</b></p>

<a href='/player/add'>Add a new player</a> 

<div class="row">
    {players}
    <div class="span4">
    	<img src="/assets/images/{image}" width="150px" height="150px">
    	<p id="gallery_player_info"><a href='/player/edit/{playerid}'>{firstname} {lastname}</a><b>{playernum}</b></p>
    </div>
    {/players}
</div>

<div id="rosterlinks">
{links}
</div>
</div>