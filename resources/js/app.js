/**
 * Sets the X-CSRF_TOKEN to use in ajax requests.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
