<div class="form">
    <? if ($isSend) : ?>
        <p>Your article is done!</p>
    <? else : ?>
        <form class="mb-4" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?= $fields['title'] ?>">
            </div>
            <div class=" mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"><?= $fields['content'] ?></textarea>
            </div>
            <div class="mb-3">
                <select class="form-select" name="id_category" aria-label="Default select example">
                    < <? foreach ($categories as $category) : ?> <option value="<?= $category['id_category'] ?>" <?= ($category['id_category'] == $fields['id_category'] ? 'selected' : '') ?>><?= $category['title'] ?></option>
                    <? endforeach ?>
                </select>
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
<hr>