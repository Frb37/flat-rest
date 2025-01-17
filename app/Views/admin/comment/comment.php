<?php if (isset($comment['id'])) : ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="<?= base_url('/admin/comment/update'); ?>">
                    <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                    <div class="card-header">
                        Edit comment
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" name="content" rows="3"><?= $comment['content'] ?></textarea>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Info
                </div>
                <div class="card-body">
                    <!-- Trouver un moyen d'aligner le texte de la seconde colonne à droite -->
                    <table>
                        <thead>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td> <label for="username">Posted by</label> </td>
                            <td> <?= $comment['username']; ?> </td>
                        </tr>
                        <tr>
                            <td> <label for="username">On </label></td>
                            <td> <?= $comment['created_at']; ?> </td>
                        </tr>
                        <tr>
                            <?php if (isset($meal)) { ?>
                                <td> <label for="mealname"> </label> </td>
                                <td> <?= $meal['name']; ?> </td>
                            <?php } elseif (isset($order)) { ?>
                                <td> <label for="ordernumber"> </label> </td>
                                <td> <?= $order['id']; ?> </td>
                            <?php } else { ?>
                                <td> </td>
                            <?php } ?>
                            <td> <?= $comment['name']; ?> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>