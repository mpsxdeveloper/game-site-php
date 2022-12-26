<div class="navbar">
    <a class="<?= $atual == 'home' ? 'active' : '' ?>" href="main.php"></i>&nbsp;Início</a>
    <a href="#">&nbsp;Perfil</a>    
    <a href="#">&nbsp;Mensagens</a>
    <a class="<?= $atual == 'jogos' ? 'active' : '' ?>" href="jogos.php">&nbsp;Jogos</a>
    <a href="#">&nbsp;Configurações</a>
    <a href="../controllers/SessionController.php?query=sair">&nbsp;Sair</a>
</div>
