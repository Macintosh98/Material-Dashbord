<main class="app-content">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
          <div class="tile">
            <h3 class="tile-title">Register</h3>
            <div class="tile-body">
              <form class="form-horizontal">
              <div class="form-group row">
                  <label class="control-label col-md-3">Username</label>
                  <div class="col-md-8">
                    <input class="form-control" id="username" type="text" placeholder="Enter Username">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-8">
                    <input class="form-control" id="password" type="password" placeholder="Enter Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" id="name" type="text" placeholder="Enter full name">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control" id="email" type="email" placeholder="Enter email address">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Mobile</label>
                  <div class="col-md-8">
                    <input class="form-control" id="mobile" type="text" placeholder="Enter Mobile Number">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Address</label>
                  <div class="col-md-8">
                    <textarea class="form-control" id="address" rows="4" placeholder="Enter your address"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Access Control</label>
                  <div class="col-md-8">
                    <select class="form-control" id="access_control">
                      <option value="superadmin">Super Admin</option>
                      <option value="admin">Admin </option>
                    </select>
                  </div>
                </div>
              </form>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="button" onclick="submit()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearix"></div>
    </div>
</div>
<script>
function submit() {
  $.ajax({
      type: "POST",
      url: "content_save.php",
      data: {
        from:"register_page",
        username:$('#username').val(),
        password:$('#password').val(),
        name:$('#name').val(),
        email:$('#email').val(),
        mobile:$('#mobile').val(),
        address:$('#address').val(),
        access_control:$("#access_control").val()
      },
      success: function(data){
        if(data=='correct'){
          posts('register.php')
          alert("register sucssesfully");
        }else{
          alert("enter correct information");
        }
      }
  });
}
</script>