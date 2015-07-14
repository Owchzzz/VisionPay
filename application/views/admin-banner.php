<div class="container">
    <div class="span12">
        <h4><?php echo lang('banners');?></h4>
        <a href="/admin/addbanner" class="btn btn-success"/>Add banner</a><br />
        <table class="table table-striped">
            <tr><th><?php echo lang('table=banner');?></th><th><?php echo lang('added_on');?></th><th><?php echo lang('status');?></th></tr>
            <?php echo $tablebanner;?>
        </table>
    </div>
</div>