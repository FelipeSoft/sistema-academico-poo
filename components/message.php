<div class="message">
    <p>
        <?php
            if(isset($_SESSION['flash_session'])){
                echo $_SESSION['flash_session'];
            }
        ?>
    </p>
    <p>
        <?php
            if(isset($_SESSION['password'])){
                echo $_SESSION['password'];
            }
        ?>
    </p>
</div>