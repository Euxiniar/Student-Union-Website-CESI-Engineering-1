<script>
    function processRemoveItem(Id_Article) {
        $.ajax({
            type: "POST",
            url: "removeItem.php",
            data: {
                Id_Article: Id_Article
            },
            success: function(result) {
                $(document).ready(function() {
                    setInterval(function() {
                        $.get('cart.php', function(response) {
                            $('#product-list').html(response);
                        });
                    }, );
                });
            }
        });
    }
</script>