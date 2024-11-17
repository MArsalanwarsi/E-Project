<script src="js/vendor/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>
<script>
    function cartcount() {
        $.ajax({
            url: 'code.php',
            method: 'post',
            data: {
                cartcount: 1
            },
            success: function(response) {
                $("#cart_count").html(response);
            }
        })
    }
    cartcount();
    setInterval(function() {
        cartcount();
    }, 1000);
</script>
</body>

</html>