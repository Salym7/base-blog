<div class="form col-6">
    <? if ($isSend) : ?>
        <p>Your article is done!</p>
    <? else : ?>
        <h3>Add cat</h3>
        <form class="mb-4" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?= $category['title'] ?>">
            </div>
            <div class=" mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?= $category['description'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Url</label>
                <input type="text" class="form-control" name="url" value="<?= $category['url'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="error-list">
                <? foreach ($validateErrors as $error) : ?>
                    <p><?= $error ?></p>
                <? endforeach; ?>
            </div>

        </form>
    <? endif; ?>
</div>