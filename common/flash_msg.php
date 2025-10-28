<?php if(isset($_SESSION['msg'])){ ?>
    <div>
    <?= htmlspecialchars($_SESSION['msg']) ?>
    </div>
<?php unset($_SESSION['msg']); } ?>    