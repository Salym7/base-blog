<div class="row">
    <table class="table col-6">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <!-- <th scope="col">&#8657 </th> -->
                <th scope="col">&#9998</th>
                <th scope="col">&#10006</th>
            </tr>
        </thead>
        <tr>

        </tr>
        <? foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['id_category']; ?></td>
                <td><?php echo $category['title']; ?></td>
                <td><?php echo $category['description']; ?></td>
                <td><?php echo $category['url']; ?></td>
                <!-- <td><a href="product.php?id=<?= $category[0] ?>">Watch</a></td> -->
                <td><a href="<?= BASE_URL ?>admin/cats/edit/<?= $category['id_category'] ?>">Update</a></td>
                <td><a href="<?= BASE_URL ?>admin/cats/delete/<?= $category['id_category'] ?>">Delete</a></td>
            </tr>
        <? endforeach ?>
    </table>
    <div class="form col-6">
        <? if ($isSend) : ?>
            <p>Your article is done!</p>
        <? else : ?>
            <h3>Add cat</h3>
            <form class="mb-4" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $fields['title'] ?>">
                </div>
                <div class=" mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?= $fields['description'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Url</label>
                    <input type="text" class="form-control" name="url" value="<?= $fields['url'] ?>">
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
</div>