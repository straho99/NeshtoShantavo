<section class="register">
  <h1>Вход</h1>

  <form method="post" action="{{ secure_url('user/login') }}">
    <div class="reg_section personal_info">
      <input type="email" name="email" value="" placeholder="Потребителско име" required pattern=".{2,30}" title="минимум 2 символа, максимум 30">
      <input type="password" name="password" value="" placeholder="Парола" required pattern=".{2,30}">
    </div>
    <p class="submit">
      <input type="checkbox" id="remember" name="remember" value="remember-me" />
      <label for="remember">Запомни ме</label>
      <input type="submit" name="submit" value="Вход">
    </p>
    <p>
      <label>Нямате регистрация?</label><a href="{{ secure_url('user/register') }}">Регистрирайте се</a>
    </p>
  </form>
</section>