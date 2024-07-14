<?php require_once 'header.php'; ?>
<span>
    <div class="row container">
        <div class="col s12">
            <h3 class="light">Cadastrar Pessoa</h3>
        </div>

        <div class="col s12">

            <?php if (isset($_SESSION['emailErrorMessage'])) : ?>
                <?php
                $nome = $_SESSION['nomeCadastro'];
                $email = $_SESSION['emailCadastro'];
                ?>
                <h4 style="font: 20pt normal Arial; color:red;"><?= htmlspecialchars($_SESSION['emailErrorMessage']) ?></h4>
                <?php unset($_SESSION['emailErrorMessage']); ?>
            <?php else : ?>
                <?php
                $nome = '';
                $email = '';
                ?>
            <?php endif; ?>

            <form action="?router=People/cadastro/" method="post" enctype="multipart/form-data">
                <div class="input-filed col s12">
                    <input type="text" name="nome" value="<?= $nome ?>" id="nome" required>
                    <label for="nome">Digite seu nome</label>
                </div>

                <div class="input-filed col s12">
                    <input type="email" name="email" value="<?= $email ?>" id="email" required>
                    <label for="email">Digite seu Email</label>
                </div>
                <div class="input-field col s12">
                    <button type="submit" id="submitButton" class="btn-small" disabled>Cadastrar</button>
                    <a href="?router=People/home" class="btn-small blue">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</span>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nomeInput = document.getElementById('nome');
        const emailInput = document.getElementById('email');
        const submitButton = document.getElementById('submitButton');

        function validateForm() {
            const nome = nomeInput.value.trim();
            const email = emailInput.value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (nome !== '' && emailPattern.test(email)) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        nomeInput.addEventListener('input', validateForm);
        emailInput.addEventListener('input', validateForm);
    });
</script>
<?php require_once 'footer.php'; ?>