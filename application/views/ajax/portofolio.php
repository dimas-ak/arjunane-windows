<?PHP
defined('BASEPATH') or exit('rika mau ngapa kang? :/');
$group = $this->dbs->group_by('kategori', 'portofolio');
?>
<div class="portofolio">
	<div class="body">
		<div class="head">
			<div class="content-left">
				<div class="icon">
					<img src="<?PHP echo photo_ikon('list-start.png') ?>" alt="arjunane">
				</div>
				<div class="text">
					<span>Portofolio</span>
				</div>
			</div>
			<div class="content-right">
				<div class="text close" title="Close">
					<span>X</span>
				</div>
			</div>
		</div>
		<div class="article">
			<div class="wrap">
				<?PHP
				foreach ($group as $g):
					$content = $this->dbs->result_key('kategori', $g->kategori, 'portofolio');
					?>
					<div class="kategori">
						<span><?PHP echo $g->kategori ?></span>
					</div>
					<?PHP 
						foreach ($content as $content): 
						$photo = explode(',',$content->photo);
						?>
						<div class="content" data-article="<?PHP echo $content->id ?>">
							<div class="title">
								<div class="icon">
									<img src="<?PHP echo photo_ikon($content->icon) ?>" alt="<?PHP echo $content->konten ?>">
								</div>
								<div class="text">
									<span><?PHP echo $content->konten ?></span>
								</div>
							</div>
							<div class="photo">
								<img src="<?PHP echo photo_portofolio($photo[0]) ?>" alt="<?PHP echo $content->judul ?>">
								<div class="judul">
									<span><?PHP echo $content->judul ?></span>
								</div>
							</div>
						</div>
					<?PHP endforeach; ?>
				<?PHP endforeach; ?>
			</div>
			<div class="wrap-detail">
				<div data-content="" class="detail-article">
					
				</div>
			</div>
		</div>
	</div>
	<script id="as9odf7y">
		$(document).ready(function () {
			$('#as9odf7y').remove();
			$('.portofolio .body .article .content').click(function(){
				var a = $(this).attr('data-article'), b = $('.portofolio .body .wrap-detail .detail-article').attr('data-content'),c = $('.portofolio .body .wrap-detail .detail-article');
				if(a === b){
					c.parent('.wrap-detail').hasClass('aktif') ? c.parent('.wrap-detail').removeClass('aktif') : c.parent('.wrap-detail').addClass('aktif');
				}else{
					$.ajax({
						url: "<?PHP echo site_url('properties/portofolio/')?>" + a,
						type: "POST",
						success: function(data) {
							c.attr('data-content',a);
							c.parent('.wrap-detail').addClass('aktif');
							var y = JSON.parse(data), z = y.view;
							c.html(z);
						}
					});
				}
			});
			$('.portofolio .body .head .close').click(function () {
				$('.portofolio').animate({
					bottom: '100%',
					height: 0,
					complete: function () {
						$('.portofolio').remove();
					}
				});
			});
		});
	</script>
</div>