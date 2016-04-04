{{ stylesheet_link('css/login.css') }}

{{content()}}
<div class="wrapper">
{{ flash.output() }}
  <form class="form-signin" method="post" >
    <h2 class="form-signin-heading">Please login</h2>
    <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
    <input type="password" class="form-control" name="password" placeholder="Password" required="" />
    <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  </form>
</div>
