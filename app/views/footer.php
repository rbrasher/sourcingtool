</div>
<!-- end wrapper -->

<script>
    $(document).ready(function() {
        $('.datep').datepicker({
            inline: true,
            dateFormat: "yy-mm-dd"
        });
        
        <?php if($this->uri->segment(1) == 'products' && $this->uri->segment(2) == 'add' || $this->uri->segment(1) == 'products' && $this->uri->segment(2) == 'edit') : ?>
            $('#toggle').click(function(e) {
                e.preventDefault();

                $(".manu").fadeToggle("fast");
            });
            
            var
                $container = $("#example1"),
                $console = $("#exampleConsole"),
                hot;

            hot = new Handsontable($container[0], {
                columnSorting: false,
                startRows: 1,
                startCols: 8,
                rowHeaders: true,
                colHeaders: ['Name', 'Email', 'Contact Info', 'Total Price', 'Price Per Item', 'Qty Per Pkg', 'MOQ', 'Lead Time', 'Notes'],
                columns: [
                  {},
                  {},
                  {},
                  {},
                  {},
                  {},
                  {},
                  {},
                  {}
                ],
                minSpareCols: 0,
                minSpareRows: 0,
                contextMenu: true
            });

            $('#save').click(function() {
                $.ajax({
                    url: '<?php echo base_url();?>products/add_bulk_manufacturer/<?php echo $product->id;?>',
                    data: {data: hot.getData()}, // returns all cells' data
                    dataType: 'json',
                    type: 'POST',
                    success: function (res) {
                      if (res.result === 'ok') {
                        console.log('Data saved');
                        location.reload(true);
                      }
                      else {
                        console.log('Save error');
                      }
                    },
                    error: function () {
                      console.log('Save error');
                    }
                });
            });

        <?php endif;?>
            
        <?php if($this->uri->segment(1) == 'products' && $this->uri->segment(2) == 'add' || $this->uri->segment(1) == 'products' && $this->uri->segment(2) == 'edit' || $this->uri->segment(1) == 'products' && $this->uri->segment(2) == 'edit_production') :?>
            
            var total_price = 0, 
                target_price = 0, 
                fba_fee_est = 0;
            
            var estimated_sales_per_day = 0,
                margin_per_sale = 0,
                estimated_margin_per_month = 0;

            $('#total_price').on('blur', function() {
                total_price = this.value;
                calculate_margin();
            });

            $('#target_price').on('blur', function() {
                target_price = this.value;
                calculate_margin();
            });

            $('#fba_fee_est').on('blur', function() {
                fba_fee_est = this.value;
                calculate_margin();
            });
            
            $('#estimated_sales_per_day').on('blur', function() {
                estimated_sales_per_day = this.value;
                calculateMonthlyMargin();
            });
            
            function calculateMonthlyMargin() {
                estimated_margin_per_month = (margin_per_sale * estimated_sales_per_day) * 30;
                $('#estimated_margin_per_month').val(estimated_margin_per_month.formatMoney(2, '.', ','));
            }

            function calculate_margin() {       
                var margin = ((target_price - fba_fee_est) - total_price);
                console.log(margin);
                margin_per_sale = margin;
                $('#margin_per_sale').val(margin.formatMoney(2, '.', ','));
            };
         <?php endif;?>
        
    });
    
    Number.prototype.formatMoney = function(c, d, t){
        var n = this, 
            c = isNaN(c = Math.abs(c)) ? 2 : c, 
            d = d === undefined ? "." : d, 
            t = t === undefined ? "," : t, 
            s = n < 0 ? "-" : "", 
            i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
            j = (j = i.length) > 3 ? j % 3 : 0;
           return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
     };
</script>

</body>
</html>
