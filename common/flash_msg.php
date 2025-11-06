<?php if(isset($_SESSION['msg'])){ ?>
    
    <div class="alert alert-primary text-center w-100" role="alert">
    <?= htmlspecialchars($_SESSION['msg']) ?>
    </div>

    <?php unset($_SESSION['msg']) ?>
<?php } ?>    