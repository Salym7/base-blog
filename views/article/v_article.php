<div class="content">
    <? if ($hasPost) : ?>
        <div class="article">
            <h1><?= $post['title'] ?></h1>
            <div><?= $post['content'] ?></div>
            <hr>
            <? if ($isAdmin) : ?>
                <a href="<?= BASE_URL ?>article/delete/<?= $post['id_article'] ?>">Remove</a> |
                <a href=" <?= BASE_URL ?>article/edit/<?= $post['id_article'] ?>">Edit</a>
            <? endif ?>
        </div>
        <h4>Add comments</h4>
        <form class="mb-4" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="error-list">
                <? foreach ($validateErrors as $error) : ?>
                    <p><?= $error ?></p>
                <? endforeach; ?>
            </div>
        </form>
        <h4 class="mb-4">Comments</h4>
        <ul class="list-group">

            <? foreach ($messages as $message) : ?>
                <div class="massages">
                    <li class="list-group-item">
                        <h6><?= $message['name'] ?></h6>
                        <p><?= $message['content'] ?></p>
                    </li>
                </div>
            <? endforeach; ?>
        </ul>
    <? else : ?>
        <div class="e404">
            <h1>Страница не найдена!</h1>
        </div>
    <? endif; ?>
</div>