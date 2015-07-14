
      <div class="container">
          <div class="row">
              <div class="span4">
                  <form class="form-horizontal" action="/admin/newspost/" method="post" enctype="multipart/form-data">
                      <h3>Post News</h3><hr />
                      <label>Title: </label> <input type="text" name="title" placeholder="Enter Title Here"/><br /><br />
                      <label>Picture (thumbnail): </label><input type="file" name="file" /><br /><br />
                      <textarea style="margin-left:35px;" name="content" rows="5" cols="185">Enter Content Here</textarea><br /><br />
                      <button style="margin-left:1090px;" type="submit" class="btn btn-warning"/>Submit</button>
                      
                  </form>

              </div>
              
              
              <div class="span8">
                  <table style="margin-top:25px;">
                      <tr id="tabletitle"><th id="tabletitle" colspan="3">News History</th></tr>
                      <tr><th>Title</th><th>Date</th><th>Actions</th></tr>
                      <?php echo $history;?>
                  </table>
              </div>
          </div>
      </div>
      
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
    <script src="/media/js/bootstrap.min.js"></script>
  </body>
</html>