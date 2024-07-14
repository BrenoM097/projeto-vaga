<?php require_once 'header.php' ?>
<span>
    <div class="row container">

        <form action="?router=People/home" method="GET" class="row">
            <div class="input-field col s12">
                <input type="text" name="search" id="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" placeholder="Buscar por nome ou email">
                <label for="search">Buscar</label>
            </div>
            <div class="input-field col s12">
                <button type="submit" class="btn-small">Buscar</button>
                <a href="?router=People/home" class="btn-small grey">Limpar</a>
            </div>
        </form>

        <?php if (isset($_SESSION['message'])) : ?>
            <h4 style="font: 20pt normal Arial; color:green;"><?= htmlspecialchars($_SESSION['message']) ?></h4>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <?php if (count($peoples) % 2 != 0) : ?>
            <div class="fs-1">
                <a href="?router=People/sortear" class="btn-small blue" onclick="return confirm('O número de pessoas é impar , alguem vai ficar de fora, tem certeza?')">Sortear</a>
            </div>
        <?php else : ?>
            <a href="?router=People/sortear" class="btn-small blue">Sortear</a>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peoples as $data) : ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['nome'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><a href="?router=People/deletar&id=<?= $data['id'] ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')"><i class="fa-solid fa-trash"></i></a>
                            <a href="?router=People/editar&id=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</span>
<?php require_once 'footer.php' ?>