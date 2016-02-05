</div>
<!-- end wrapper -->
<script>
    $(document).ready(function() {
        $('.datep').datepicker({
            inline: true,
            dateFormat: "yy-mm-dd"
        });
        
        <?php if($this->uri->segment(1) == 'listings' && $this->uri->segment(2) == 'add' || $this->uri->segment(1) == 'listings' && $this->uri->segment(2) == 'edit') :?>
            $(".wizzy").cleditor();
        <?php endif;?>
    });
</script>

</body>
</html>
