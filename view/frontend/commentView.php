<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Modifier un commentaire</h1>
	<p><a href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour à la liste des commentaires</a></p>

    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

    <form action = "index.php?action=editComment&amp;id=<?= $comment['id']?>" method = "post">
            <div>
                <label for="comment">Modifier le commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>