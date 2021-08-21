<?php $this->view('includes/header', $data); ?>

      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                    </div>

                    <form class="user" method="POST">
                      <div class="form-group">
                        <input
                          type="text"
                          name="username"
                          class="form-control form-control-user"
                          placeholder="Enter Your Username..."
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="password"
                          name="password"
                          class="form-control form-control-user"
                          placeholder="Password"
                        />
                      </div>

                      <button
                        type="submit"
                        class="btn btn-primary btn-user btn-block"
                      >
                        Login
                      </button>
                      <hr />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php $this->view('includes/footer', $data); ?>

  </body>
</html>
