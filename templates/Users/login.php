<!--Main layout-->
<main>
    <div class="container">

      <!--Section: Main info-->
      <section class="mt-0 pt-0 wow">
      <div class="row">
  <div class="col-md-6 col-xl-5 mb-4 mt-1">
    
    <div class="card">
    <div class="card-header info">
    Sign in
  </div>
  <div class="card-body">
<!-- Default form login -->
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>

    <p class="mb-4">Enter Distributor/Franchise to Login</p>

    <!-- Email -->
    <?= $this->Form->control('username', ['required' => true,'class'=>'form-control mb-4', 'placeholder' =>'User Name']) ?>

    
    <!-- Password -->
    <?= $this->Form->control('password', ['required' => true,'class'=>'form-control mb-4', 'placeholder' =>'Password']) ?>
    

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="/forgotpassword">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="/registration">Register</a>
    </p>

    
    <?= $this->Form->end() ?>
<!-- Default form login -->
</div>
</div>
</div>

</div>

      </section>
    </div>
</main>  