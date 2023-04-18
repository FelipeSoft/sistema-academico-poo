<div class="message">
    <?php if(isset($_SESSION['flash_session'])): ?>
        <p><?=$_SESSION['flash_session']?></p>
        <?php unset($_SESSION['flash_session']); ?>
    <?php endif; ?>
    
    <?php if(isset($_SESSION['password'])): ?>
        <p><?=$_SESSION['password']?></p>
        <?php unset($_SESSION['password']); ?>
    <?php endif; ?>
</div>