<main class="app-content">
  <div class="row justify-content-center">
    <div class="col-md-12"> 
      <div class="tile" style="min-height:800px">
        <h3 class="tile-title">Add Post's</h3>
        <div class="tile-body">
          <form>
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#basic">Basic</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#containts">Containts</a></li>
                <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#image">Image</a></li>
                <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#video">Video</a></li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="basic">
                <div class="form-group">
                    <label class="control-label">Category</label>
                    <select class="form-control" id="category">
                      <option value="Health_Insurance">Health Insurance</option>
                      <option value="Life_Insurance">Life Insurance </option>
                      <option value="Term_Insurance">Term Insurance</option>
                      <option value="Car_Insurance">Car Insurance</option>
                      <option value="Two-wheeler_Insurance">Two-wheeler Insurance</option>
                      <option value="Travel_Insurance">Travel Insurance</option>
                      <option value="Investment_Plan">Investment Plan</option>
                      <option value="Other_Articles">Other Articles </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">PageName</label>
                    <input class="form-control" type="text" id="pagename" placeholder="Enter Page Name">
                  </div>  
                  <div class="form-group">
                    <label class="control-label">Title</label>
                    <input class="form-control" type="text" id="title" placeholder="Enter Full Title">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Publisher</label>
                    <input class="form-control" type="text" id="publisher" placeholder="Enter Publisher Name">
                  </div>                   
                </div>
                <div class="tab-pane fade" id="containts"> 
                  <div class="form-group">
                    <label class="control-label">Containts</label>
                      <div id="editor">
                        <div id='edit' style="margin-top: 30px;"></div>
                        <div class="tile">
                          <div class="tile-title-w-btn">
                            <h3 class="title">Preview</h3>
                          </div>
                          <div class="tile-body">
                            <hr><div id="preview" class="fr-view"></div><hr>
                          </div>
                        </div> 
                      </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="image">
                  <div class="form-group">
                    <label class="control-label">Identity Proof</label>
                    <input class="form-control" type="file">
                  </div>                
                </div>
                <div class="tab-pane fade" id="video">
                  <div class="form-group">
                    <label class="control-label">video</label>
                    <textarea class="form-control" rows="4" placeholder="Enter your Video link"></textarea>
                  </div>
                </div>
              </div>
            </div>            
          </form>
        </div>
        <div class="tile-footer">
          
        </div>
      </div>
      <button class="btn btn-primary" type="button" onclick="submit()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
    </div>
  </div>
</main>
<script>
function submit() {
      $.ajax({
      type: "POST",
      url: "content_save.php",
      data: {
        from:"addpost_page",
        category:$('#category').val(),
        pagename:$('#pagename').val(),
        title:$('#title').val(),
        publisher:$('#publisher').val(),
        contents:$('#preview').html()
        },
      success: function(data){
        if(data=='correct'){
          posts('addpost.php')
          alert("register sucssesfully");
        }else{
          alert("enter correct information");
        }
      }
      });
    }
</script>
