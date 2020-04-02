<div id="footer">

	<div id="container" class="footer_bottom">
		<div class="footer_left">
			<ul>
				<?php
				$footerMenu = get_footer_menu();
				// var_dump($re_menu); die();
				foreach ($footerMenu as $d_menu) {
					$url = makeUrl($d_menu['title']) . "-" . $d_menu['id'] . ".html";
				?>
					<li><a href="<?= $url ?>" class="active"><?= $d_menu['title'] ?></a></li>
				<?php
				}
				?>
			</ul>
			<div class="spacer"></div>
			<div class="copyright">@NhaDatOnline 2020</div>
		</div>

		<div class="footer_right">
			<ul>
				<li><a href="#" target="_blank" class="linkdin"></a></li>
				<li><a href="#" target="_blank" class="twitter"></a></li>
				<li><a href="#" target="_blank" class="fb"></a></li>
			</ul>
		</div>

		<div class="spacer"></div>
	</div>

</div>


<script type="text/javascript">
	$('.footer_part ul').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
</script>