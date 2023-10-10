<li class="admin_tool">
	Add Page <button id="addPageButton" onclick="$('#addPage').toggle();"><img style="width:20px" src="<?php echo Config::$path['appLocal'];?>Tools/add.png"></button>
	<ul id="addPage" style="display: none">
		<form method="post" action="/?requestproxy=addPage">
			<li>
				Type: 
				<select style="margin-left: 8px;" name="link_type">
					<option value="internal">Internal Page</option>
					<!-- We will add code for that soon -->
					<!-- <option value="external">External Webpage</option> -->
				</select>
			</li>
			<li>
				Name: <input type="text" name="name" size="15" placeholder="page name...">
			</li>
			<!-- Maybe add option to choose a root template later -->
			<input type="hidden" name="rootTemplate" value="mainTemplate">
			<li>
				URL: <input style="margin-left: 10px; type="text" name="url" size="15" placeholder="url...">
				<br>
				<input style="margin-left:46px" type="submit" value="create">
			</li>
		</form>
	</ul>
</li>

<li class="admin_tool">
	<!-- TODO have a warning system popup -->
	Delete Page: 
	<form method="post" style="display: inline-block;" action="/?requestproxy=deletePage">
		<select name="id" style="margin-left:-1px">
			<?php 
				$menuData = new DataObject("SELECT * FROM `hyperlinks` WHERE `group`='navlinks';");
				$menuData->runQuery();
				if($menuData->rowCount() > 0)
				{
					$navLinks = $menuData->fetchAllData();

					foreach($navLinks as $entry)
						echo '<option value="'.$entry['id'].'">'.$entry['name'].'</option>';															
				}
			?>
		</select>
		<input type="hidden" name="type" value="page">
		<input type="submit" value="delete" style="cursor: pointer;color:red">
	</form>
</li>