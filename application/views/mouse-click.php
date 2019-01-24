<?php
$view_display = $this->session->userdata('view-display');
$sub_menu_view = ['large' => 'Large Icons', 'medium' => 'Medium Icons', 'small' => 'Small Icons'];
?>
	<div class="mouse-click">
		<div class="body">
			<div class="menu right">
				<div class="icon"></div>
				<span>View</span>
				<div class="sub-menu view">
					<?php
				foreach ($sub_menu_view as $smv => $key):
					$aktif_sub_view = NULL;
					if ($view_display == $smv) {
						$aktif_sub_view = ' aktif';
					} else if ($smv == 'medium' && $view_display == NULL) {
						$aktif_sub_view = ' aktif';
					}
					?>
						<div class="content">
							<div content="<?php echo $smv ?>" class="icon<?php echo $aktif_sub_view ?>"></div>
							<span>
								<?php echo $key ?>
							</span>
						</div>
						<?php endforeach; ?>
				</div>
			</div>
			<a href="<?php echo site_url($this->uri->uri_string()) ?>">
				<div class="menu">
					<div class="icon"></div>
					<span>Refresh</span>
				</div>
			</a>
			<div onclick="fullScreen()" class="menu border fs">
				<div class="icon">
					<img src="<?php echo photo_ikon('fullscreen.png') ?>">
				</div>
				<span>Fullscreen</span>
			</div>
			<a href="?display=display-settings" class="ahref">
				<div class="menu ds">
					<div class="icon">
						<img src="<?php echo photo_ikon('desktop-computer.png') ?>">
					</div>
					<span>Display Settings</span>
				</div>
			</a>
		</div>
	</div>