<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="/css/style.css">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <div class="headLogin">
      <h3>Login</h3>
  </div>

  <form action="" method="post">
    <table class="tableLogin">
      <tr>
        <td colspan="2"><label for="email">Email Address</label></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" class="textLogin" name="email" id="email" value="<?= set_value('email') ?>"></td>
      </tr>
      <tr>
        <td colspan="2"><label for="password">Password</label></td>
      </tr>
      <tr>
        <td colspan="2"><input type="password" name="password" id="password" class="textLogin" value=""></td>
      </tr>
      <tr>
        <td style="text-align:left;"><button type="submit" id="signaturebtn" style="font-size:18px;">Login</button></td>
        <td style="text-align:right;"><a href="/register" class="link">Don't have an account yet?</a></td>
      </tr>
    </table>

    <br>

    <table style="margin-left:auto; margin-right:auto; text-align:left; width:250px;">
      <tr>
        <td>
          <?php if (session()->get('success')) : ?>
            <div>
              <?= session()->get('success') ?>
            </div>
          <?php endif; ?>

          <?php if (isset($validation)) : ?>
            <div>
              <?= $validation->listErrors() ?>
            </div>
          <?php endif; ?>
        </td>
      </tr>
    </table>

  </form>

</body>

</html>