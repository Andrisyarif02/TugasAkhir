<script>
    $(document).ready(function(){
        $("#findBtn").click(function(){
            var cat = $("#catId").val();
            $.ajax({
                type: 'get';
                dataType: 'html';
                url: '{{url('/productCat')}}',
                data: 'cat_id' + cat,
                succes:function(response){
                    console.log(response);
                    $("#productCard").html(response);
                }
            });
        });
    });
</script>