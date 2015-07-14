<div class="container">
    <div class="span12">
        <h4>Add a banner</h4>
        <form style="margin-top:25px;"action="/admin/banneraddsave/" method="post" enctype="multipart/form-data">
            <label>Banner Size: </label> <select name="banner-size">
                <?php echo $select;?>
        </select>
            <br />
        <input type="file" name="file" style="margin-top:15px;"/>
        <div id="banner-preview" />
        </div>
        <button style="margin-top:10px;" type="submit" class="btn btn-warning">Submit</button>
        </form>
        
    </div>
</div>