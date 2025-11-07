<?php if(isset($_SESSION['msg'])){ ?>
    
    <div class="alert alert-warning text-center" role="alert">
    <?= htmlspecialchars($_SESSION['msg']) ?>
    </div>

    <?php unset($_SESSION['msg']) ?>
<?php } ?>    