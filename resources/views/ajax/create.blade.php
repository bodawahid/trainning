<x-form title="Create Offer Using Ajax" submitLabel="Create" />
{{-- ajax code is written here --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#AjaxId').click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#myForm')[0]);
            $.ajax({
                url: "{{ route('store') }}",
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
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        // Clear previous errors
                        $('.error').text('');
                        // Display validation errors
                        $.each(errors, function(key, value) {
                            $('#' + key + '-error').html(value[
                                0]); // Display first error for each field
                        });
                    }
                }
            });
        });
    });
</script>
