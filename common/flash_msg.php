<?php if(isset($_SESSION['msg'])){ ?>
    <div>
    <p style="color:red;"><?= htmlspecialchars($_SESSION['msg']) ?></p>
    </div>
<?php unset($_SESSION['msg']); } ?>    