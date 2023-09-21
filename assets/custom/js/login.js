$( document ).ready(function() {
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host;
    if (getUrl.pathname.split('/').length > 2){
      baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    }
  
    $("#field_forget_password").hide();
  
    $('body').on('submit', '#form_login', function(event){
      console.log('ok');
        event.preventDefault();
          var url = $(this).attr('action');
      console.log(url);
          var data = new FormData(this);
      $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(retData){
                  console.log(retData);
                  if (retData.status == true){
                    Swal.fire({
                        icon: 'success',
                        title: retData.message,
                        showConfirmButton: false,
                        timer: 2000
                    }).then((check) => {
                        if (check) {
                            let timerInterval
                            Swal.fire({
                                title: 'Redirect...',
                                html: 'Wait you will be directed in <b></b> milliseconds.',
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                                }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href= baseUrl;
                                }
                            });
                        }
                    });
                 window.location.href = baseUrl+'/admin/dashboard';
                  }else{
            $("body").alert('', retData.message, 'danger');
                  }
              },
              cache: false,
        contentType: false,
        processData: false,
            dataType: "json"
          });
    });
});