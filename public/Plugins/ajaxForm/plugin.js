(function() {


    var bar = $('#upload-bar');
    
    var percent = $('#upload-bar');
    
    
    $('form').ajaxForm({
    
        beforeSend: function() {
    
            var percentVal = '0%';
    
            var posterValue = $('input[name=file]').fieldValue();
    
            bar.width(percentVal)
    
            percent.html(percentVal);
    
        },
    
        uploadProgress: function(event, position, total, percentComplete) {
    
            var percentVal = percentComplete + '%';
    
            bar.width(percentVal)
    
            percent.html(percentVal);
    
        },
    
        success: function() {
    
            var percentVal = 'Fisierul se salveaza';
    
            bar.width(percentVal)
    
            percent.html(percentVal);
    
        },
    
        complete: function(xhr) {
    
            window.location.href = "/upload";
    
        }
    
    });
    
})();