
<div style="min-height: 400px;width:100%;background-color: white;text-align: center;">
	<div style="padding: 20px;max-width:350px;display: inline-block;">
		<form method="post" enctype="multipart/form-data">
                  <!-- this part is for user profile settings such as password,first name,last name,gender, email -->
  						
			<?php
		 
				$settings_class = new Settings();

				$settings = $settings_class->get_settings($_SESSION['communitx_userid']);

				if(is_array($settings)){

					echo "<input type='text' id='textbox' name='first_name' value='".htmlspecialchars($settings['first_name'])."' placeholder='First name' />";
					echo "<input type='text' id='textbox' name='last_name' value='".htmlspecialchars($settings['last_name'])."' placeholder='Last name' />";

					echo "<select id='textbox' name='email' style='height:30px;'>

							<option>".htmlspecialchars($settings['gender'])."</option>
							<option>Male</option>
							<option>Female</option>
						</select>";

					echo "<input type='text' id='textbox' name='email'  value='".htmlspecialchars($settings['email'])."' placeholder='Email'/>";
					echo "<input type='password' id='textbox' name='password'  value='".htmlspecialchars($settings['password'])."' placeholder='Password'/>";
					echo "<input type='password' id='textbox' name='password2'  value='".htmlspecialchars($settings['password'])."' placeholder='Password'/>";
					
					echo "<br>About me:<br>
							<textarea id='textbox' style='height:200px;' name='about'>".htmlspecialchars($settings['about'])."</textarea>
						";
					echo "Delete my account";
					echo "<br>";
					echo '<input id="post_button" type="submit" value="Save">';

				}
				
			?>

		</form>
		<?php
		echo '<a href="'.ROOT. 'deleteUser"><div id="post_button" style="height:25px;width:130px; margin-right:430px;">Delete my account</div></a>';
		?>
	</div>
</div>