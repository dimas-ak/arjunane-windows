<?PHP if ($this->session->userdata('windows') != 'windows-7' && $this->session->userdata('windows') != 'windows-xp' && $this->session->userdata('windows') != 'windows-98'): ?>
    <div class="language">
        <div class="content aktif">
    	<div class="country">
    	    <span>IND</span>
    	</div>
    	<div class="info">
    	    <span>Indonesian</span>
    	    <span>Republic Indonesia</span>
    	</div>
        </div>
        <div class="content">
    	<div class="country">
    	    <span>ENG</span>
    	</div>
    	<div class="info">
    	    <span>English (United States)</span>
    	    <span>US</span>
    	</div>
        </div>
    </div>
<?PHP else: ?>
    <div class="language">
        <div class="content aktif">
    	<div class="country">
    	    <span>IND</span>
    	</div>
    	<div class="info">
    	    <span>Indonesian (Republic Indonesia)</span>
    	</div>
        </div>
        <div class="content">
    	<div class="country">
    	    <span>ENG</span>
    	</div>
    	<div class="info">
    	    <span>English (United States)</span>
    	</div>
        </div>
    </div>
<?PHP endif; ?>
