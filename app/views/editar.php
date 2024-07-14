<?php require_once 'header.php'; ?>

<span>
    <div class="row container">
        <div class="col s12">
            <h3 class="light">Editar Pessoa</h3>
        </div>

        <div class="col s12">

            <form action="?router=People/editar/" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $pessoa['id'] ?>">
                <div class="input-filed col s12">
                    <input type="text" value="<?= $pessoa['nome'] ?>" name="nome" id="nome" required>
                    <label for="nome">Atualize o nome</label>
                </div>

                <div class="input-filed col s12">
                    <input type="email" value="<?= $pessoa['email'] ?>" name="email" id="email" required>
                    <label for="email">Atualize o email</label>
                </div>
                <div class="input-field col s12">
                    <button type="submit" id="submitButton" class="btn-small" disabled>Atualizar</button>
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