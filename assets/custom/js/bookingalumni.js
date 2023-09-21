jQuery(document ).ready(function() {
    var getUrl = window.location;
		var baseUrl = getUrl .protocol + "//" + getUrl.host;
		if (getUrl.pathname.split('/').length > 2){
			baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
		}

    $("body").on("change", "#fakultas", function(){
        var id_fakultas = $("option:selected", this).val();
        
        // var baseUrl = window.location.origin;
        console.log(baseUrl);
        $.ajax({
            method: "POST",
            url: baseUrl+"/api/prodi/getprodi",
            data: {'id_fakultas': id_fakultas},
            success: function(retData) {
                $("#prodi").children('option:not(:first)').remove();
                // console.log(retData.length);
                $.each(retData.prodi, function(key, value){
                    $('#prodi').append($("<option></option>").attr("value",value.id_prodi).text(value.nama_prodi));
                });
            }
    
        })
    });

    // $('#npm').bind('input propertychange', function() {
    //     console.log($(this).val());
    // });

    $("body").on("change", "#npm", function(){
        var npm = $(this).val()
        
        // var baseUrl = window.location.origin;
        console.log(npm);
        $.ajax({
            method: "POST",
            url: baseUrl+"/api/registration/cekpeserta",
            data: {'npm': npm},
            success: function(retData) {
                if(retData.status == true){
                    Swal.fire({
                        icon: 'warning',
                        text: 'Your NPM/NIK has been registered.',
                        showConfirmButton: true,
                        // timer: 1000
                    })
                    $('#register').prop('disabled', true);
                }else{
                    $('#register').prop('disabled', false);
                }
            }
    
        })
    });

    $("body").on('submit', '#form_registrasi', function(event) {
        event.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: "POST",
            url: baseUrl+"/api/registrationalumni/save",
            data: data,

            beforeSend: function() {
                $('#form_registrasi').html("<center><h1>Mohon Tunggu Data sedang Diproses!</h1></center>").attr('disabled', 'disabled');
                return true;
            },
            success: function(data) {
                setInterval(function() {
                    $('#register').html("Form submited Successfully!")
                }, 1000);
            },
            
            success: function(retData){
                if(retData.status == true){
                    Swal.fire({
                        icon: 'success',
                        text: 'Registration Successfull.',
                        showConfirmButton: false,
                        timer: 1000
                    }).then((check) => {
                        if (check) {
                            let timerInterval
                            Swal.fire({
                                title: 'Redirect...',
                                html: 'Wait you will be directed in <b></b> milliseconds.',
                                timer: 1000,
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
                                    window.location.assign("https://lembagabahasa.widyatama.ac.id/");
                                }
                            });
                        }
                    });
                }
               else{
                alert(retData.title, retData.message, 'failed');
               }
            },
            cache: false,
      contentType: false,
      processData: false,
			dataType: "json"
        });
        // alert(data);
    })
});