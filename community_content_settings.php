
<div style="min-height: 400px;width:100%;background-color: white;text-align: center;">
	<div style="padding: 20px;max-width:350px;display: inline-block;">
		<form method="post" enctype="multipart/form-data">  <!-- this section contains all the community settings, such as community name,type admin and etc -->

  						
			<?php
		 
				$settings_class = new Settings();

				$settings = $settings_class->get_settings($community_data['userid']);

				if(is_array($settings)){

					echo "<input type='text' id='textbox' name='first_name' value='".htmlspecialchars($settings['first_name'])."' placeholder='Community name' />";
 
					echo "<select id='textbox' name='community_type' style='height:30px;width:104%;'>

							<option>".htmlspecialchars($settings['community_type'])."</option>
							<option>Public</option>
							<option>Private</option>
						</select>";

 					echo "<br>About me:<br>
							<textarea id='textbox' style='height:200px;' name='about'>".htmlspecialchars($settings['about'])."</textarea>
						";

					echo '<input id="post_button" type="submit" value="Save">';
				}
				
			?>

		</form>
		<?php
		$_SESSION["community_id"]=$community_data['userid'];
		echo '<a href="'.ROOT. 'deleteCommunity"><div id="post_button" style="height:38px;width:130px; margin-right:430px;">Delete this community</div></a>';
		?>
	</div>
</div>