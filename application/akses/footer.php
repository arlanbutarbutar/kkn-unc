<script src="../assets/js/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-easing/jquery.easing.min.js"></script>
<script src="../assets/js/jquery/jquery.min.js"></script>
<script src="../assets/js/form-file.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 15000)
    
    $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>