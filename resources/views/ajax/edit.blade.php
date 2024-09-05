<x-form title="Update Offer Using Ajax" :value="$offer" submitLabel="Update" />
{{-- ajax code is written here --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#AjaxId').click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#myForm')[0]);
            $.ajax({
                url: "{{ route('ajax.update') }}",
                type: "POST",
                data: formData,
                enctype: 'multipart/form-data',
                contentType: false, // Prevent jQuery from setting content type
                processData: false, // Prevent jQuery from processing the data
                success: function(response) {
                    if (response.status) {
                        $("#success_div").show();
                        // alert(response.msg);
                    }
                },
                error: function(response) {
                    if (response.status)
                        alert('failed');
                }
            });
        });
    });
</script>
