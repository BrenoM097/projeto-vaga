<?php require_once 'header.php' ?>
<span>
    <div class="row container">

        <?php if (isset($_SESSION['message'])) : ?>
            <h4 style="font: 20pt normal Arial; color:green;"><?= htmlspecialchars($_SESSION['message']) ?></h4>
            <?php unset($_SESSION['message']);
            ?>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Dupla</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($duplas); $i++) : ?>
                    <tr>
                        <td><?= $duplas[$i][0] ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</span>
<?php require_once 'footer.php' ?>