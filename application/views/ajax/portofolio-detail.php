<?PHP
    $photo = explode(',',$detail['photo']);
?>
    <div class="title">
        <span>
            <?php echo $detail['judul'] ?>
        </span>
    </div>
    <div class="wrap">
        <div class="cop">
            <div class="icon">
                <img src="<?php echo photo_ikon($detail['icon'])?>">
            </div>
            <div class="text">
                <span>
                    <?php echo $detail['kategori'] ?>
                </span>
            </div>
        </div> 
        <?PHP 
            foreach($photo as $photo): 
            if($photo != NULL):
        ?>
            <div class="photo">
                <img src="<?PHP echo photo_portofolio($photo) ?>">
                <a class="button" target="_blank" href="<?PHP echo photo_portofolio($photo)?>">DETAIL</a>
            </div>
        <?PHP 
            endif;
            endforeach;
        ?>
    </div>