<div style="width: 100%; background-color: #000; height: 70px;">
    <div style="text-align: center; font-size: 60px; line-height: 70px;">
        <span style="color: #fff;">Game Site</span>        
    </div>
</div>
<?php if(isset($_SESSION["nome"])): ?>
    <div style="width: 100%; background-color: #000; height: 20px;">
        <span style="font-size: 18px; float: right; padding-right: 10px; color: #fff; font-weight: bold;">
            <?php echo "Olá, " . $_SESSION["nome"]; ?>
        </span>
    </div>
<?php endif; ?>
