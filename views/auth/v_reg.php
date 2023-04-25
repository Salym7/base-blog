<form method="post" class="w-50    ">
    <div class="form-group">
        <label for="auth-login">Login</label>
        <input type="text" class="form-control" id="auth-login" name="login" value="<?= $fields['login'] ?>">
    </div>
    <div class="form-group">
        <label for="auth-password">Password</label>
        <input type="password" class="form-control" id="auth-password" name="password" value="<?= $fields['password'] ?>">
    </div>
    <div class="form-group">
        <label for="auth-password">Email</label>
        <input type="email" class="form-control" id="auth-password" name="email" value="<?= $fields['email'] ?>">
    </div>
    <div class="form-group">
        <label for="auth-password">Name</label>
        <input type="text" class="form-control" id="auth-password" name="name" value="<?= $fields['name'] ?>">
    </div>
    <hr>
    <button class="btn btn-primary">Regestration now</button>
    <div class="error-list mt-4">
        <? foreach ($validateErrors as $error) : ?>
            <p class="alert alert-danger"><?= $error ?></p>
        <? endforeach; ?>
    </div>
</form>